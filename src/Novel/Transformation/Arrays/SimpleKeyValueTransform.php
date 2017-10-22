<?php
namespace Novel\Transformation\Arrays;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\Arrays\IKeyValueToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\ArrayArrowSymbol;


class SimpleKeyValueTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IKeyValueToken))
			return;
		
		$stream->push($token->getKey());
		$stream->push(ArrayArrowSymbol::class);
		$stream->push($token->getValue());
	}
}