<?php
namespace Novel\Core\Transforming;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;


interface ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void;
}