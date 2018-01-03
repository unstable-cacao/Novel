<?php
namespace Novel\Transformation\Functions;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\Functions\Common\IAbstractable;
use Novel\Core\Tokens\Functions\Common\IStaticable;
use Novel\Core\Tokens\Functions\Common\IWithBody;
use Novel\Core\Tokens\Functions\Common\IWithUse;
use Novel\Core\Tokens\Functions\IFunctionToken;
use Novel\Core\Tokens\OOP\Accessibility\IWithAccessibilityToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\Bracket\CurlyBracketCloseSymbol;
use Novel\Symbols\Bracket\CurlyBracketOpenSymbol;
use Novel\Symbols\Bracket\RoundBracketCloseSymbol;
use Novel\Symbols\Bracket\RoundBracketOpenSymbol;
use Novel\Symbols\ColonSymbol;
use Novel\Symbols\Keyword\AbstractSymbol;
use Novel\Symbols\Keyword\FunctionSymbol;
use Novel\Symbols\Keyword\StaticSymbol;
use Novel\Symbols\SemicolonSymbol;
use Novel\Symbols\WhiteSpace\SpaceSymbol;


class FunctionTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IFunctionToken))
			return;
		
		if ($token instanceof IAbstractable && $token->isAbstract())
		{
			$stream->push(AbstractSymbol::class);
			$stream->push(SpaceSymbol::class);
		}
		
		if ($token instanceof IWithAccessibilityToken)
		{
			$stream->transformToken($token->getAccessibilityToken());
			$stream->push(SpaceSymbol::class);
		}
		
		if ($token instanceof IStaticable && $token->isStatic())
		{
			$stream->push(StaticSymbol::class);
			$stream->push(SpaceSymbol::class);
		}
		
		$stream->push(FunctionSymbol::class);
		$stream->push(SpaceSymbol::class);
		$stream->push($token->getNameToken());
		
		$stream->push(RoundBracketOpenSymbol::class);
		$stream->transformToken($token->getParamListToken());
		$stream->push(RoundBracketCloseSymbol::class);
		
		if ($token instanceof IWithUse && $token->hasUseScope())
		{
			$stream->transformToken($token->getUseToken());
		}
		
		$stream->push(ColonSymbol::class);
		$stream->transformToken($token->getReturnTypeToken());
		
		if ($token instanceof IWithBody)
		{
			$stream->push(CurlyBracketOpenSymbol::class);
			$stream->transformToken($token->getBody());
			$stream->push(CurlyBracketCloseSymbol::class);
		}
		else
		{
			$stream->push(SemicolonSymbol::class);
		}
	}
}