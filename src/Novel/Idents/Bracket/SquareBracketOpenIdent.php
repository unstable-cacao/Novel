<?php
namespace Novel\Idents\Bracket;


use Novel\Consts\Idents\BracketNames;
use Novel\Core\IIdent;


class SquareBracketOpenIdent implements IIdent
{
	public function name()
	{
		return BracketNames::SQUARE_OPEN;
	}
}