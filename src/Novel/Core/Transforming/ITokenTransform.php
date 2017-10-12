<?php
namespace Novel\Core\Transforming;


use Novel\Core\ISymbol;
use Novel\Core\IToken;
use Novel\Core\Stream\ITransformStream;


interface ITokenTransform
{
	/**
	 * @param IToken $token
	 * @param ITransformStream $stream
	 * @return ISymbol[]|null
	 */
	public function transform(IToken $token, ITransformStream $stream): ?array;
}