<?php
namespace Novel\Symbols\Bracket;


use Novel\Consts\Symbols\BracketNames;
use Novel\Core\ISymbol;
use Novel\Symbols\Base\AbstractSingleStringSymbol;


class RoundBracketOpenSymbol extends AbstractSingleStringSymbol implements ISymbol
{
	public function __construct()
	{
		parent::__construct("(");
	}
	
	
	public function name()
	{
		return BracketNames::ROUND_OPEN;
	}
}