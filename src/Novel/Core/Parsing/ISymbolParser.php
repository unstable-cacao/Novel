<?php
namespace Novel\Core\Parsing;


use Novel\Core\ISymbol;


interface ISymbolParser
{
	public function parse(ISymbol $symbol): ?string;
}