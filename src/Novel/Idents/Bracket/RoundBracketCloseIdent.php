<?php
namespace Novel\Idents\Bracket;


use Novel\Consts\Idents\BracketNames;
use Novel\Core\IIdent;


class RoundBracketCloseIdent implements IIdent
{
	public function name()
	{
		return BracketNames::ROUND_CLOSE;
	}
}