<?php
namespace Novel\Stream;


use Novel\Core\IIdent;
use Novel\Core\Stream\IIdentWriteStream;


class IdentWriteStream implements IIdentWriteStream
{
	/** @var IIdent[] */
	private $idents = [];


	/**
	 * @param IIdent|IIdent[] $item
	 * @return static|IIdentWriteStream
	 */
	public function push($item): IIdentWriteStream
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