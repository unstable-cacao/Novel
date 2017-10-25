<?php
namespace Novel\Transformation\Arrays;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\Arrays\IPushElementOperation;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\Bracket\SquareBracketCloseSymbol;
use Novel\Symbols\Bracket\SquareBracketOpenSymbol;
use Novel\Symbols\Operator\EqualSymbol;


class ArrayPushElementOperationTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IPushElementOperation))
			return;
		
		$stream->push($token->getTarget());
		$stream->push(SquareBracketOpenSymbol::class);
		$stream->push(SquareBracketCloseSymbol::class);
		
		$stream->push(EqualSymbol::class);
		$stream->push($token->getValue());
	}
}