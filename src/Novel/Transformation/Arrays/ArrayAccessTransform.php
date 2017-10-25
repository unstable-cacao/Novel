<?php
namespace Novel\Transformation\Arrays;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\Arrays\IArrayAccessToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\Bracket\SquareBracketCloseSymbol;
use Novel\Symbols\Bracket\SquareBracketOpenSymbol;


class ArrayAccessTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IArrayAccessToken))
			return;
		
		$stream->push($token->getTarget());
		$stream->push(SquareBracketOpenSymbol::class);
		$stream->push($token->getKey());
		$stream->push(SquareBracketCloseSymbol::class);
	}
}