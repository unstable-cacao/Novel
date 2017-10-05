<?php
namespace Novel\Stream;


use Novel\Core\IIdent;
use Novel\Core\IMainTransformer;
use Novel\Core\IToken;
use Novel\Core\Stream\ITransformStream;


class TransformStream extends IdentWriteStream implements ITransformStream
{
	/** @var IMainTransformer */
	private $main;
	
	
	public function __construct(IMainTransformer $transformer)
	{
		$this->main = $transformer;
	}
	
	
	public function validateClear(): void
	{
		if ($this->getIdents()) 
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
	 * @return IIdent[]
	 */
	public function result(): array
	{
		return $this->getIdents();
	}
}