<?php
namespace Novel\Transformation\Functions;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\Functions\UseScope\IUseItemToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\DollarSymbol;
use Novel\Symbols\ReferenceSymbol;


class UseItemTokenTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IUseItemToken))
			return;
		
		if ($token->isByReference())
		{
			$stream->push(ReferenceSymbol::class);
		}
		
		$stream->push(DollarSymbol::class);
		$stream->transformToken($token->getNameToken());
	}
}