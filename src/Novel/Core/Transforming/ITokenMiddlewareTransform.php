<?php
namespace Novel\Core\Transforming;


use Novel\Core\IToken;
use Novel\Core\Stream\IIdentWriteStream;


interface ITokenMiddlewareTransform
{
	/**
	 * @param IToken $token
	 * @param IIdentWriteStream $writer
	 * @param callable $next
	 */
	public function executeTransform(IToken $token, IIdentWriteStream $writer, callable $next): void;
}