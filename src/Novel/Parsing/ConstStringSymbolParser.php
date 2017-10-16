<?php
namespace Novel\Parsing;


use Novel\Core\ISymbol;
use Novel\Core\Parsing\ISymbolParser;
use Novel\Symbols\ConstStringSymbol;


class ConstStringSymbolParser implements ISymbolParser
{
	public function parse(ISymbol $symbol): ?string
	{
		if ($symbol instanceof ConstStringSymbol)
		{
			return $symbol->value();
		}
		
		return null;
	}
}