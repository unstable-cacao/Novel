<?php
namespace Novel\Symbols\WhiteSpace;


use Novel\Consts\Symbols\WhiteSpaceNames;
use Novel\Core\ISymbol;


class NewLineSymbol implements ISymbol
{
	public function name()
	{
		return WhiteSpaceNames::NEW_LINE;
	}
}