<?php
namespace Novel\Stream;


use Novel\Core\IIdent;
use Novel\Core\Stream\ITransformStream;
use Novel\Core\Stream\IIdentWriteStream;


class IdentWriteStream implements IIdentWriteStream
{
	/** @var IIdent[] */
	private $idents = [];
	
	
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
	 * @return IIdent[]
	 */
	public function getIdents(): array
	{
		return $this->idents;
	}
}