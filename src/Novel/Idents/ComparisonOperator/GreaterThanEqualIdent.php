<?php
namespace Novel\Idents\ComparisonOperator;


use Novel\Consts\Idents\ComparisonOperatorNames;
use Novel\Core\IIdent;


class GreaterThanEqualIdent implements IIdent
{
	public function name()
	{
		return ComparisonOperatorNames::GREATER_THAN_EQUAL;
	}
}