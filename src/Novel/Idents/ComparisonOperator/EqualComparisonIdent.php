<?php
namespace Novel\Idents\ComparisonOperator;


use Novel\Consts\Idents\ComparisonOperatorNames;
use Novel\Core\IIdent;


class EqualComparisonIdent implements IIdent
{
	public function name()
	{
		return ComparisonOperatorNames::EQUAL_COMPARISON;
	}
}