<?php
namespace Novel\Transformation\Functions;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\Functions\IReturnStatementToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\Keyword\ReturnSymbol;
use Novel\Symbols\SemicolonSymbol;
use Novel\Symbols\WhiteSpace\SpaceSymbol;


class ReturnStatementTokenTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IReturnStatementToken))
			return;
		
		$stream->push(ReturnSymbol::class);
		$stream->push(SpaceSymbol::class);
		$stream->transformChildren($token);
		$stream->push(SemicolonSymbol::class);
	}
}