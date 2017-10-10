<?php
namespace Novel\Core\Transforming;


use Novel\Core\IToken;
use Novel\Core\Stream\ISymbolWriteStream;


interface ITokenMiddlewareTransform
{
	/**
	 * @param IToken $token
	 * @param ISymbolWriteStream $writer
	 * @param callable $next
	 */
	public function executeTransform(IToken $token, ISymbolWriteStream $writer, callable $next): void;
}