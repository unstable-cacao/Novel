<?php
namespace Novel\Core\Stream;


use Novel\Core\ISymbol;
use Novel\Core\IToken;


interface ITransformStream extends ISymbolWriteStream
{
	/**
	 * @param IToken $of
	 * @return ITransformStream
	 */
	public function transformChildren(IToken $of): ITransformStream;
	
	/**
	 * @return ISymbol[]
	 */
	public function result(): array;
}