<?php
namespace Novel\Transformation\OOP;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\OOP\INewToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\Keyword\NewSymbol;
use Novel\Symbols\WhiteSpace\SpaceSymbol;


class NewTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof INewToken))
			return;
		
		$stream->push(NewSymbol::class);
		$stream->push(SpaceSymbol::class);
		
		$stream->transformToken($token->getNameToken());
		$stream->transformToken($token->getParametersList());
	}
}