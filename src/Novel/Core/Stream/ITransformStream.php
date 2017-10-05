<?php
namespace Novel\Core\Stream;


use Novel\Core\IIdent;
use Novel\Core\IToken;


interface ITransformStream extends IIdentWriteStream
{
	/**
	 * @param IToken $of
	 * @return ITransformStream
	 */
	public function transformChildren(IToken $of): ITransformStream;
	
	/**
	 * @return IIdent[]
	 */
	public function result(): array;
}