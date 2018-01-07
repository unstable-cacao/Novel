<?php
namespace Novel\Transformation\Functions;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\Functions\IReturnToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\Keyword\ReturnSymbol;
use Novel\Symbols\WhiteSpace\SpaceSymbol;


class ReturnExpressionTokenTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IReturnToken))
			return;
		
		$stream->push(ReturnSymbol::class);
		$stream->push(SpaceSymbol::class);
		$stream->push($token->getValue());
	}
}