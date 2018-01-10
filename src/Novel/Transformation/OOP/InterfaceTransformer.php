<?php
namespace Novel\Transformation\OOP;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\OOP\IInterfaceToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\Bracket\CurlyBracketCloseSymbol;
use Novel\Symbols\Bracket\CurlyBracketOpenSymbol;
use Novel\Symbols\Keyword\ExtendsSymbol;
use Novel\Symbols\Keyword\InterfaceSymbol;
use Novel\Symbols\WhiteSpace\SpaceSymbol;


class InterfaceTransformer implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IInterfaceToken))
			return;
		
		$stream->push(InterfaceSymbol::class);
		$stream->push(SpaceSymbol::class);
		
		$declaration = $token->getDeclarationToken();
		$stream->transformToken($declaration->getNameToken());
		
		if ($declaration->isExtend())
		{
			$stream->push(SpaceSymbol::class);
			$stream->push(ExtendsSymbol::class);
			$stream->push(SpaceSymbol::class);
			$stream->transformToken($declaration->getExtend());
		}
		
		$stream->push(CurlyBracketOpenSymbol::class);
		$stream->transformToken($token->getDefinitionToken());
		$stream->push(CurlyBracketCloseSymbol::class);
	}
}