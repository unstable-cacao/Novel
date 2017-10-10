<?php
namespace Novel\Core\Stream;


use Novel\Core\ISymbol;


interface ISymbolWriteStream
{
	/**
	 * @param ISymbol|ISymbol[] $item
	 * @return static|ISymbolWriteStream
	 */
	public function push($item): ISymbolWriteStream;
}