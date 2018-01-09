<?php
namespace Novel\Transformation\Functions;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\Functions\IFunctionCallToken;
use Novel\Core\Transforming\ITokenTransform;


class FunctionCallTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IFunctionCallToken))
			return;
		
		$stream->transformToken($token->getTarget());
		$stream->transformToken($token->getParametersList());
	}
}