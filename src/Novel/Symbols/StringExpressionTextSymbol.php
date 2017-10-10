<?php
namespace Novel\Symbols;


use Novel\Consts\Symbols\PHPNames;
use Novel\Core\ISymbol;


class StringExpressionTextSymbol implements ISymbol
{
	public function name()
	{
		return PHPNames::STRING_EXPRESSION_TEXT;
	}
}