<?php
namespace Novel\Transformation;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\Strings\IPlainTextToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\PlainTextSymbol;


class PlainTextTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IPlainTextToken))
			return;
		
		$stream->push(new PlainTextSymbol($token->text()));
	}
}