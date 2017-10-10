<?php
namespace Novel\Symbols\ComparisonOperator;


use Novel\Consts\Symbols\ComparisonOperatorNames;
use Novel\Core\ISymbol;
use Novel\Symbols\Base\AbstractSingleStringSymbol;


class SpaceshipSymbol extends AbstractSingleStringSymbol implements ISymbol
{
	public function __construct()
	{
		parent::__construct("<=>");
	}
	
	
	public function name()
	{
		return ComparisonOperatorNames::SPACESHIP;
	}
}