<?php
namespace Novel\Idents\Bracket;


use Novel\Consts\Idents\BracketNames;
use Novel\Core\IIdent;
use Novel\Idents\Base\AbstractSingleStringIdent;


class RoundBracketCloseIdent extends AbstractSingleStringIdent implements IIdent
{
	public function __construct()
	{
		parent::__construct(")");
	}
	
	
	public function name()
	{
		return BracketNames::ROUND_CLOSE;
	}
}