<?php
namespace Novel\Symbols;


use Novel\Consts\Symbols\PHPNames;
use Novel\Core\ISymbol;


class PlainTextSymbol implements ISymbol
{
	public function name()
	{
		return PHPNames::PLAIN_TEXT;
	}
}