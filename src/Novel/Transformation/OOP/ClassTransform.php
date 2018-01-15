<?php
namespace Novel\Transformation\OOP;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\OOP\IClassToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\Bracket\CurlyBracketCloseSymbol;
use Novel\Symbols\Bracket\CurlyBracketOpenSymbol;
use Novel\Symbols\CommaSymbol;
use Novel\Symbols\Keyword\AbstractSymbol;
use Novel\Symbols\Keyword\ClassSymbol;
use Novel\Symbols\Keyword\ExtendsSymbol;
use Novel\Symbols\Keyword\ImplementsSymbol;
use Novel\Symbols\WhiteSpace\SpaceSymbol;


class ClassTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IClassToken))
			return;
		
		$declarationToken = $token->getDeclarationToken();
		
		if ($declarationToken->isAbstract())
		{
			$stream->push(AbstractSymbol::class);
			$stream->push(SpaceSymbol::class);
		}
		
		$stream->push(ClassSymbol::class);
		$stream->push(SpaceSymbol::class);
		
		$stream->transformToken($declarationToken->getNameToken());
		
		if ($declarationToken->isExtend())
		{
			$stream->push(SpaceSymbol::class);
			$stream->push(ExtendsSymbol::class);
			$stream->push(SpaceSymbol::class);
			$stream->transformToken($declarationToken->getExtend());
		}
		
		if ($declarationToken->isImplement())
		{
			$stream->push(SpaceSymbol::class);
			$stream->push(ImplementsSymbol::class);
			$stream->push(SpaceSymbol::class);
			
			$implements = $declarationToken->getImplement();
			
			for ($i = 0; $i < count($implements) - 1; $i++)
			{
				$stream->transformToken($implements[$i]);
				$stream->push(CommaSymbol::class);
			}
			
			$stream->transformToken($implements[$i]);
		}
		
		$stream->transformToken($token->getDefinitionToken());
	}
}