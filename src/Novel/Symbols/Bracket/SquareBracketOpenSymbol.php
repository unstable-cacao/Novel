<?php
namespace Novel\Symbols\Bracket;


use Novel\Consts\Symbols\BracketNames;
use Novel\Core\ISymbol;
use Novel\Symbols\Base\AbstractSingleStringSymbol;


class SquareBracketOpenSymbol extends AbstractSingleStringSymbol implements ISymbol
{
	public function __construct()
	{
		parent::__construct("[");
	}
	
	
	public function name()
	{
		return BracketNames::SQUARE_OPEN;
	}
}