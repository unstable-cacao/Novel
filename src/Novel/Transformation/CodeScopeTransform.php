<?php
namespace Novel\Transformation;


use Novel\Core\ISymbol;
use Novel\Core\IToken;
use Novel\Core\Stream\ITransformStream;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\Bracket\CurlyBracketCloseSymbol;
use Novel\Symbols\Bracket\CurlyBracketOpenSymbol;
use Novel\Tokens\CodeScopeToken;


class CodeScopeTransform implements ITokenTransform
{
	/**
	 * @param IToken $token
	 * @param ITransformStream $stream
	 * @return ISymbol[]|null
	 */
	public function transform(IToken $token, ITransformStream $stream): ?array
	{
		if ($token instanceof CodeScopeToken)
		{
			$result = [new CurlyBracketOpenSymbol()];
			$result = array_merge($result, $stream->transformChildren($token)->result());
			$result[] = new CurlyBracketCloseSymbol();
			
			return $result;
		}
		
		return null;
	}
}