<?php
namespace Novel\Transformation\Functions;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\Functions\IFunctionCallToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\Bracket\RoundBracketCloseSymbol;
use Novel\Symbols\Bracket\RoundBracketOpenSymbol;


class FunctionCallTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IFunctionCallToken))
			return;
		
		$stream->transformToken($token->getTarget());
		$stream->push(RoundBracketOpenSymbol::class);
		$stream->transformToken($token->getParametersList());
		$stream->push(RoundBracketCloseSymbol::class);
	}
}