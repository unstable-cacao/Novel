<?php
namespace Novel\Parsing;


use Novel\Core\ISymbol;
use Novel\Core\Parsing\ISymbolParser;
use Novel\Symbols\Base\AbstractSingleStringSymbol;


class SingleStringSymbolParser implements ISymbolParser
{
	public function parse(ISymbol $symbol): ?string
	{
		if ($symbol instanceof AbstractSingleStringSymbol)
		{
			return $symbol->getSymbol();
		}
		
		return null;
	}
}