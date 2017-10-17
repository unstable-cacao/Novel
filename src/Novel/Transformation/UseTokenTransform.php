<?php
namespace Novel\Transformation;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\ConstStringSymbol;
use Novel\Symbols\EndOfStatementSymbol;
use Novel\Symbols\Keyword\AsSymbol;
use Novel\Symbols\Keyword\UseSymbol;
use Novel\Symbols\WhiteSpace\SpaceSymbol;
use Novel\Tokens\UseToken;


class UseTokenTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof UseToken))
			return;
		
		$stream->push([UseSymbol::class, SpaceSymbol::class]);
		$stream->push(new ConstStringSymbol($token->fullName()));
		
		if ($token->getAs())
		{
			$stream->push([SpaceSymbol::class, AsSymbol::class]);
			$stream->push(new ConstStringSymbol($token->getAs()));
		}
		
		$stream->push(EndOfStatementSymbol::class);
	}
}