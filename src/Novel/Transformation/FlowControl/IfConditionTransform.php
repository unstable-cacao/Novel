<?php
namespace Novel\Transformation\FlowControl;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\FlowControl\IfStatement\IIfConditionToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\Bracket\RoundBracketCloseSymbol;
use Novel\Symbols\Bracket\RoundBracketOpenSymbol;
use Novel\Symbols\Keyword\IfSymbol;


class IfConditionTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IIfConditionToken))
			return;
		
		$stream->push(IfSymbol::class);
		$stream->push(RoundBracketOpenSymbol::class);
		$stream->transformToken($token->getCondition());
		$stream->push(RoundBracketCloseSymbol::class);
		
		$stream->transformToken($token->getBody());
	}
}