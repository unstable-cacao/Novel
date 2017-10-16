<?php
namespace Novel\Transformation;


use Novel\Core\ISymbol;
use Novel\Core\IToken;
use Novel\Core\Stream\ITransformStream;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Stream\SymbolWriteStream;
use Novel\Symbols\Bracket\CurlyBracketCloseSymbol;
use Novel\Symbols\Bracket\CurlyBracketOpenSymbol;
use Novel\Tokens\CodeScopeToken;


class CodeScopeTokenTransform implements ITokenTransform
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
			$writer = new SymbolWriteStream();
			$writer->push(new CurlyBracketOpenSymbol());
			$writer->push($stream->transformChildren($token));
			$writer->push(new CurlyBracketCloseSymbol());
			
			return $writer->getSymbols();
		}
		
		return null;
	}
}