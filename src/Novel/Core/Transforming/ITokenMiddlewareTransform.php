<?php
namespace Novel\Core\Transforming;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;


interface ITokenMiddlewareTransform
{
	public function executeTransform(IToken $token, ITokenTransformStream $writer, callable $next): void;
}