<?php
namespace Novel\Symbols\ComparisonOperator;


use Novel\Consts\Symbols\ComparisonOperatorNames;
use Novel\Core\ISymbol;
use Novel\Symbols\Base\AbstractSingleStringSymbol;


class LessThanSymbol extends AbstractSingleStringSymbol implements ISymbol
{
	public function __construct()
	{
		parent::__construct("<");
	}
	
	
	public function name()
	{
		return ComparisonOperatorNames::LESS_THAN;
	}
}