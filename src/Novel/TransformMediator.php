<?php
namespace Novel;


use Novel\Core\IToken;
use Novel\Core\ISymbol;
use Novel\Core\ITransformMediator;
use Novel\Core\Transforming\ITransformSetup;

use Novel\Stream\TokenTransformStream;
use Novel\Transformation\TransformCollection;


class TransformMediator implements ITransformMediator
{
	/** @var TransformCollection */
	private $setup;
	
	
	public function __construct()
	{
		$this->setup = new TransformCollection();
	}
	
	
	/**
	 * @param IToken $target
	 * @return ISymbol[]
	 */
	private function executeMainTransformers(IToken $target): array
	{
		$stream = new TokenTransformStream($this);
		$main = $this->setup->getMainFor($target);
		
		foreach ($main as $item)
		{
			$item->transform($target, $stream);
			
			if (!$stream->isEmpty())
			{
				break;
			}
		}
		
		return $stream->getSymbols();
	}
	
	private function executeMiddleware(IToken $target, TokenTransformStream $stream): void 
	{
		$middle = $this->setup->getMiddlewareFor($target);
		
		$callback = function () use ($target)
		{
			return $this->executeMainTransformers($target);
		};
		
		foreach ($middle as $item)
		{
			$callback = function () use ($target, $item, $callback)
			{
				$stream = new TokenTransformStream($this);
				$item->executeTransform($target, $stream, $callback);
				return $stream->getSymbols();
			};
		}
		
		$stream->push($callback());
	}
	
	private function executePreTransform(IToken $target, TokenTransformStream $stream): void 
	{
		$chain = $this->setup->getChainFor($target);
		
		foreach ($chain as $item)
		{
			$item->preTransform($target, $stream);
		}
	}
	
	private function executePostTransform(IToken $target, TokenTransformStream $stream): void
	{
		$chain = $this->setup->getChainFor($target);
		
		foreach ($chain as $item)
		{
			$item->postTransform($target, $stream);
		}
	}
	
	
	/**
	 * @param IToken $token
	 * @return ISymbol[]
	 */
	public function transform(IToken $token): array
	{
		$stream = new TokenTransformStream($this);
		
		$this->executePreTransform($token, $stream);
		$this->executeMiddleware($token, $stream);
		$this->executePostTransform($token, $stream);
		
		return $stream->getSymbols();
	}
	
	public function getSetup(): ITransformSetup
	{
		return $this->setup;
	}
}