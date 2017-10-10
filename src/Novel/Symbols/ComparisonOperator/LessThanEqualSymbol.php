<?php
namespace Novel\Symbols\ComparisonOperator;


use Novel\Consts\Symbols\ComparisonOperatorNames;
use Novel\Core\ISymbol;
use Novel\Symbols\Base\AbstractSingleStringSymbol;


class LessThanEqualSymbol extends AbstractSingleStringSymbol implements ISymbol
{
	public function __construct()
	{
		parent::__construct("<=");
	}
	
	
	public function name()
	{
		return ComparisonOperatorNames::LESS_THAN_EQUAL;
	}
}