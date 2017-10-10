<?php
namespace Novel\Core\Parsing;


use Novel\Core\ISymbol;


interface ISymbolChainParser extends ISymbolParsingObject
{
	public function preParse(ISymbol $symbol): ?string;
	public function postParse(ISymbol $symbol): ?string;
}