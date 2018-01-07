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
use Novel\Symbols\Keyword\UseSymbol;
use Novel\Symbols\SemicolonSymbol;
use Novel\Symbols\WhiteSpace\SpaceSymbol;


class FunctionTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IFunctionToken))
			return;
		
		if ($token instanceof IWithAccessibilityToken)
		{
			$stream->transformToken($token->getAccessibilityToken());
		}
		
		if ($token instanceof IAbstractable && $token->isAbstract())
		{
			$stream->push(AbstractSymbol::class);
			$stream->push(SpaceSymbol::class);
		}
		
		if ($token instanceof IStaticable && $token->isStatic())
		{
			$stream->push(StaticSymbol::class);
			$stream->push(SpaceSymbol::class);
		}
		
		$stream->push(FunctionSymbol::class);
		
		$name = $token->getNameToken();
		
		if ($name->getName()) 
		{
			$stream->push(SpaceSymbol::class);
			$stream->push($name);
		}
		
		$stream->transformToken($token->getParamListToken());
		
		if ($token instanceof IWithUse && $token->hasUseScope())
		{
			$stream->push(SpaceSymbol::class);
			$stream->push(UseSymbol::class);
			$stream->push(SpaceSymbol::class);
			$stream->transformToken($token->getUseToken());
		}
		
		if ($token->hasReturnType())
		{
			$stream->push(ColonSymbol::class);
			$stream->transformToken($token->getReturnTypeToken());
		}
		
		if ($token instanceof IWithBody)
		{
			$stream->transformToken($token->getBody());
		}
		else
		{
			$stream->push(SemicolonSymbol::class);
		}
	}
}