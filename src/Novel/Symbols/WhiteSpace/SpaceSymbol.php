<?php
namespace Novel\Symbols\WhiteSpace;


use Novel\Consts\Symbols\WhiteSpaceNames;
use Novel\Core\ISymbol;


class SpaceSymbol implements ISymbol
{
	public function name(): string
	{
		return WhiteSpaceNames::SPACE;
	}
}