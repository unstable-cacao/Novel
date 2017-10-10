<?php
namespace Novel\Symbols;


use Novel\Consts\Symbols\PHPNames;
use Novel\Core\ISymbol;


class ConstStringSymbol implements ISymbol
{
	public function name()
	{
		return PHPNames::CONST_STRING;
	}
}