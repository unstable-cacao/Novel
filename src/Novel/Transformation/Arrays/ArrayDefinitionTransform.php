<?php
namespace Novel\Transformation\Arrays;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\Arrays\IArrayDefinitionToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\CommaSymbol;
use Novel\Symbols\Bracket\SquareBracketOpenSymbol;
use Novel\Symbols\Bracket\SquareBracketCloseSymbol;


class ArrayDefinitionTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IArrayDefinitionToken))
			return;
		
		$addComma = false;
		$stream->push(new SquareBracketOpenSymbol());
		
		foreach ($token->children() as $child)
		{
			if ($addComma)
				$stream->push(CommaSymbol::class);
				
			$addComma = true;
			$stream->push($child);
		}
		
		$stream->push(new SquareBracketCloseSymbol());
	}
}