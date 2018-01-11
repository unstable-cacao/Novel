<?php
namespace Novel\Transformation\Operators;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\Operators\IOperatorToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\PlainTextSymbol;


class OperatorTokenTransformer implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IOperatorToken))
			return;
		
		$stream->push(new PlainTextSymbol($token->getOperator()));
	}
}