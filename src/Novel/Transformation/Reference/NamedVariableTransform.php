<?php
namespace Novel\Transformation\Reference;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\Reference\INamedVariableToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\ConstStringSymbol;
use Novel\Symbols\DollarSymbol;


class NamedVariableTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof INamedVariableToken))
			return;
		
		$stream->push(DollarSymbol::class);
		$stream->push(new ConstStringSymbol($token->getName()));
	}
}