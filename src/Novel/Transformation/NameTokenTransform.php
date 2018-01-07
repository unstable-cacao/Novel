<?php
namespace Novel\Transformation;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\INameToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\ConstStringSymbol;


class NameTokenTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof INameToken))
			return;
		
		$stream->push(new ConstStringSymbol($token->getName()));
	}
}