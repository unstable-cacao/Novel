<?php
namespace Novel\Transformation\Operators;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\Operators\IBinaryOperationToken;
use Novel\Core\Transforming\ITokenTransform;


class BinaryOperationTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IBinaryOperationToken))
			return;
		
		$stream->transformToken($token->getLeftOperand());
		$stream->transformToken($token->getOperatorToken());
		$stream->transformToken($token->getRightOperand());
	}
}