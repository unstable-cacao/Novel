<?php
namespace Novel\Transformation\Scope;


use Novel\Core\IToken;
use Novel\Core\Tokens\IGlobalScopeToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Transforming\ITokenTransform;

use Novel\Symbols\PHPSymbol;


class GlobalScopeTokenTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IGlobalScopeToken))
			return;
		
		$stream->push(PHPSymbol::class);
		$stream->transformChildren($token);
	}
}