<?php
namespace Novel\Transformation;


use Novel\Core\ISymbol;
use Novel\Core\IToken;
use Novel\Core\Stream\ITransformStream;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Stream\SymbolWriteStream;
use Novel\Symbols\ConstStringSymbol;
use Novel\Symbols\EndOfStatementSymbol;
use Novel\Symbols\Keyword\AsSymbol;
use Novel\Symbols\Keyword\UseSymbol;
use Novel\Symbols\WhiteSpace\SpaceSymbol;
use Novel\Tokens\UseToken;


class UseTokenTransform implements ITokenTransform
{
	/**
	 * @param IToken $token
	 * @param ITransformStream $stream
	 * @return ISymbol[]|null
	 */
	public function transform(IToken $token, ITransformStream $stream): ?array
	{
		if ($token instanceof UseToken)
		{
			$writer = new SymbolWriteStream();
			$writer->push([new UseSymbol(), new SpaceSymbol()]);
			$writer->push(new ConstStringSymbol($token->fullName()));
			
			if ($token->getAs())
			{
				$writer->push([new SpaceSymbol(), new AsSymbol()]);
				$writer->push(new ConstStringSymbol($token->getAs()));
			}
			
			$writer->push(new EndOfStatementSymbol());
			
			return $writer->getSymbols();
		}
		
		return null;
	}
}