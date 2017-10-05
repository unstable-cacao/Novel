<?php
namespace Novel\Core\Stream;


use Novel\Core\IIdent;


interface IIdentWriteStream
{
	/**
	 * @param IIdent|IIdent[] $item
	 * @return static|IIdentWriteStream
	 */
	public function push($item): IIdentWriteStream;
}