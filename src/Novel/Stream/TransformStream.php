<?php
namespace Novel\Stream;


use Novel\Core\IIdent;
use Novel\Core\IMainTransformer;
use Novel\Core\IToken;
use Novel\Core\Stream\ITransformStream;


class TransformStream implements ITransformStream
{
	/** @var IMainTransformer */
	private $main;
	
	/** @var IIdent[] */
	private $idents = [];
	
	
	public function __construct(IMainTransformer $transformer)
	{
		$this->main = $transformer;
	}
	
	
	public function validateClear(): void
	{
		if ($this->idents) 
		{
			throw new \Exception('The transform stream have elements but thous ' . 
				'elements were not returned by the transformer.');
		}
	}


	/**
	 * @param IIdent|IIdent[] $item
	 * @return static|ITransformStream
	 */
	public function push($item): ITransformStream
	{
		if (is_array($item))
		{
			$this->idents = array_merge($this->idents, $item); 
		}
		else
		{
			$this->idents[] = $item;
		}
		
		return $this;
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
		return $this->idents;
	}
}