<?php
namespace Novel\Stream;


use Novel\Core\ISymbol;
use Novel\Core\ITransformMediator;
use Novel\Core\IToken;
use Novel\Core\Stream\ITransformStream;


class TransformStream extends SymbolWriteStream implements ITransformStream
{
	/** @var ITransformMediator */
	private $main;
	
	
	public function __construct(ITransformMediator $transformer)
	{
		$this->main = $transformer;
	}
	
	
	public function validateClear(): void
	{
		if ($this->getSymbols()) 
		{
			throw new \Exception('The transform stream have elements but thous ' . 
				'elements were not returned by the transformer.');
		}
	}

	
	/**
	 * @param IToken $of
	 * @return ITransformStream
	 */
	public function transformChildren(IToken $of): ITransformStream
	{
		foreach ($of->children() as $child)
		{
			$this->push($this->main->transform($child));
		}
		
		return $this;
	}

	/**
	 * @return ISymbol[]
	 */
	public function result(): array
	{
		return $this->getSymbols();
	}
}