<?php
namespace Novel\Idents\Bracket;


use Novel\Consts\Idents\BracketNames;
use Novel\Core\IIdent;


class CurlyBracketOpenIdent implements IIdent
{
	public function name()
	{
		return BracketNames::CURLY_OPEN;
	}
}