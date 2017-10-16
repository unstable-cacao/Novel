<?php
namespace Novel\Transformation;


use Novel\Core\ISymbol;
use Novel\Core\IToken;
use Novel\Core\Stream\ITransformStream;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Stream\SymbolWriteStream;
use Novel\Symbols\ConstStringSymbol;
use Novel\Symbols\EndOfStatementSymbol;
use Novel\Symbols\Keyword\NamespaceSymbol;
use Novel\Symbols\WhiteSpace\SpaceSymbol;
use Novel\Tokens\NamespaceToken;


class NamespaceTokenTransform implements ITokenTransform
{
	/**
	 * @param IToken $token
	 * @param ITransformStream $stream
	 * @return ISymbol[]|null
	 */
	public function transform(IToken $token, ITransformStream $stream): ?array
	{
		if ($token instanceof NamespaceToken)
		{
			$writer = new SymbolWriteStream();
			$writer->push([new NamespaceSymbol(), new SpaceSymbol()]);
			$writer->push(new ConstStringSymbol($token->getNamespace()));
			$writer->push(new EndOfStatementSymbol());
			
			return $writer->getSymbols();
		}
		
		return null;
	}
}