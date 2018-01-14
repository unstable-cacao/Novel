<?php
namespace Novel\Transformation\Utils;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Transforming\ITokenChainTransform;


class SymbolDumperPostTransform implements ITokenChainTransform
{
	public function preTransform(IToken $token, ITokenTransformStream $stream): void
	{
		
	}
	
	public function postTransform(IToken $token, ITokenTransformStream $stream): void
	{
		var_dump(get_class($token), $stream->getSymbols());
	}
}