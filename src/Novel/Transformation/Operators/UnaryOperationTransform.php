<?php
namespace Novel\Transformation\Operators;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\Operators\IUnaryOperationToken;
use Novel\Core\Transforming\ITokenTransform;


class UnaryOperationTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IUnaryOperationToken))
			return;
		
		if ($token->isLeft())
		{
			$stream->transformToken($token->getOperatorToken());
		}
		
		$stream->transformToken($token->getOperand());
		
		if (!$token->isLeft())
		{
			$stream->transformToken($token->getOperatorToken());
		}
	}
}