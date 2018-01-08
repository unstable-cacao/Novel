<?php
namespace Novel\Transformation\Functions;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\Functions\Params\IInvokeParametersListToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\Bracket\RoundBracketCloseSymbol;
use Novel\Symbols\Bracket\RoundBracketOpenSymbol;


class InvokeParametersListTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IInvokeParametersListToken))
			return;
		
		$stream->push(RoundBracketOpenSymbol::class);
		$stream->transformChildren($token);
		$stream->push(RoundBracketCloseSymbol::class);
	}
}