<?php
namespace Novel\Transformation\OOP;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\Consts\IConstDeclarationToken;
use Novel\Core\Tokens\OOP\Consts\IClassConstDeclarationToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\Keyword\ConstSymbol;
use Novel\Symbols\Operator\EqualSymbol;
use Novel\Symbols\SemicolonSymbol;
use Novel\Symbols\WhiteSpace\SpaceSymbol;


class ConstDeclarationTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IConstDeclarationToken))
			return;
		
		if ($token instanceof IClassConstDeclarationToken)
		{
			$stream->transformToken($token->getAccessibilityToken());
		}
		
		$stream->push(ConstSymbol::class);
		$stream->push(SpaceSymbol::class);
		$stream->transformToken($token->getNameToken());
		$stream->push(EqualSymbol::class);
		$stream->transformToken($token->getValue());
		$stream->push(SemicolonSymbol::class);
	}
}