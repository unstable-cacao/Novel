<?php
namespace Novel\Core\Parsing;


use Novel\Core\ISymbol;


interface ISymbolMiddlewareParser extends ISymbolParsingObject
{
	public function parse(ISymbol $symbol, callable $next): ?string;
}