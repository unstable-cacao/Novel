<?php
namespace Novel\Transformation;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\INamespaceToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\SemicolonSymbol;
use Novel\Symbols\ConstStringSymbol;
use Novel\Symbols\Keyword\NamespaceSymbol;
use Novel\Symbols\WhiteSpace\SpaceSymbol;


class NamespaceTokenTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof INamespaceToken))
			return;
		
		$stream->push([NamespaceSymbol::class, SpaceSymbol::class]);
		$stream->push(new ConstStringSymbol($token->getNamespace()));
		$stream->push(SemicolonSymbol::class);
	}
}