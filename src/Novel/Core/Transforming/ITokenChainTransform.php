<?php
namespace Novel\Core\Transforming;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;


interface ITokenChainTransform
{
	public function preTransform(IToken $token, ITokenTransformStream $stream): void;
	public function postTransform(IToken $token, ITokenTransformStream $stream): void;
}