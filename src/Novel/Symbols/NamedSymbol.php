<?php
namespace Novel\Symbols;


use Novel\Consts\Symbols\PHPNames;
use Novel\Core\ISymbol;


class NamedSymbol implements ISymbol
{
	public function name()
	{
		return PHPNames::NAMED;
	}
}