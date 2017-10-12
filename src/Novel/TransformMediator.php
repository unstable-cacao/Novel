<?php
namespace Novel;


use Novel\Core\ISymbol;
use Novel\Core\IToken;
use Novel\Core\ITransformMediator;
use Novel\Core\Transforming\ITransformSetup;

use Novel\Stream\SymbolWriteStream;
use Novel\Stream\TransformStream;
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
    	$stream = new TransformStream($this);
    	$main = $this->setup->getMainFor($target);
    	
        foreach ($main as $item)
        {
        	$stream->validateClear();
            $result = $item->transform($target, $stream);
			
            if ($result)
			{
				return $result;
			}
        }
        
        return [];
    }
	
	/**
	 * @param IToken $target
	 * @return ISymbol[]
	 */
    private function executeMiddleware(IToken $target): array 
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
				$stream = new SymbolWriteStream();
				$item->executeTransform($target, $stream, $callback);
				return $stream->getSymbols();
			};
		}
		
		return $callback();
	}
	
	/**
	 * @param IToken $target
	 * @return ISymbol[]
	 */
	private function executePreTransform(IToken $target): array 
	{
		$result = []; 
		$chain = $this->setup->getChainFor($target);
		
		foreach ($chain as $item)
		{
			$result = array_merge(
				$result, 
				$item->preTransform($target)
			);
		}
		
		return $result;
	}
	
	/**
	 * @param IToken $target
	 * @return ISymbol[]
	 */
	private function executePostTransform(IToken $target): array 
	{
		$result = []; 
		$chain = $this->setup->getChainFor($target);
		
		foreach ($chain as $item)
		{
			$result = array_merge(
				$result, 
				$item->postTransform($target)
			);
		}
		
		return $result;
	}
	
	
    /**
     * @param IToken $root
     * @return ISymbol[]
     */
    public function transform(IToken $root): array
    {
		$stream = new TransformStream($this);
		
		$stream->push($this->executePreTransform($root));
		$stream->push($this->executeMiddleware($root));
		$stream->push($this->executePostTransform($root));
		
		return $stream->result();
    }
	
	public function getSetup(): ITransformSetup
	{
		return $this->setup;
	}
}