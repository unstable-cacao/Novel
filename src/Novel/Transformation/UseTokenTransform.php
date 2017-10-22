<?php
namespace Novel\Transformation;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\IUseToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\ConstStringSymbol;
use Novel\Symbols\SemicolonSymbol;
use Novel\Symbols\Keyword\AsSymbol;
use Novel\Symbols\Keyword\UseSymbol;
use Novel\Symbols\WhiteSpace\SpaceSymbol;


class UseTokenTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IUseToken))
			return;
		
		$stream->push([UseSymbol::class, SpaceSymbol::class]);
		$stream->push(new ConstStringSymbol($token->fullName()));
		
		if ($token->getAs())
		{
			$stream->push([SpaceSymbol::class, AsSymbol::class]);
			$stream->push(new ConstStringSymbol($token->getAs()));
		}
		
		$stream->push(SemicolonSymbol::class);
	}
}