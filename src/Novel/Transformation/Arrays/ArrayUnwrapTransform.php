<?php
namespace Novel\Transformation\Arrays;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\Arrays\IArrayUnwrapToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\Operator\ArrayUnwrapSymbol;


class ArrayUnwrapTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IArrayUnwrapToken))
			return;
		
		$stream->push(ArrayUnwrapSymbol::class);
		$stream->push($token->getTarget());
	}
}