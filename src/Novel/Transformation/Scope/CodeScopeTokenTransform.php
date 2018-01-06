<?php
namespace Novel\Transformation\Scope;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\Scope\ICodeScopeToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\Bracket\CurlyBracketCloseSymbol;
use Novel\Symbols\Bracket\CurlyBracketOpenSymbol;


class CodeScopeTokenTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof ICodeScopeToken))
			return;
		
		$stream->push(CurlyBracketOpenSymbol::class);
		$stream->push($stream->transformChildren($token));
		$stream->push(CurlyBracketCloseSymbol::class);
	}
}