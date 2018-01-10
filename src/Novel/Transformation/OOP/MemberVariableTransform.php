<?php
namespace Novel\Transformation\OOP;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\OOP\Variables\IMemberVariableToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\DollarSymbol;
use Novel\Symbols\Keyword\StaticSymbol;
use Novel\Symbols\Operator\EqualSymbol;
use Novel\Symbols\SemicolonSymbol;
use Novel\Symbols\WhiteSpace\SpaceSymbol;


class MemberVariableTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IMemberVariableToken))
			return;
		
		$stream->transformToken($token->getAccessibilityToken());
		
		if ($token->isStatic())
		{
			$stream->push(StaticSymbol::class);
			$stream->push(SpaceSymbol::class);
		}
		
		$stream->push(DollarSymbol::class);
		$stream->transformToken($token->getNameToken());
		
		if ($token->hasValue())
		{
			$stream->push(EqualSymbol::class);
			$stream->transformToken($token->getValue());
		}
		
		$stream->push(SemicolonSymbol::class);
	}
}