<?php
namespace Novel\Transformation\OOP;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\OOP\ITraitToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\Bracket\CurlyBracketCloseSymbol;
use Novel\Symbols\Bracket\CurlyBracketOpenSymbol;
use Novel\Symbols\Keyword\TraitSymbol;
use Novel\Symbols\WhiteSpace\SpaceSymbol;


class TraitTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof ITraitToken))
			return;
		
		$stream->push(TraitSymbol::class);
		$stream->push(SpaceSymbol::class);
		
		$stream->transformToken($token->getDeclarationToken()->getNameToken());
		
		$stream->push(CurlyBracketOpenSymbol::class);
		$stream->transformToken($token->getDefinitionToken());
		$stream->push(CurlyBracketCloseSymbol::class);
	}
}