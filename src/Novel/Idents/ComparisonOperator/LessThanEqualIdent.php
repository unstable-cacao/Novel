<?php
namespace Novel\Idents\ComparisonOperator;


use Novel\Consts\Idents\ComparisonOperatorNames;
use Novel\Core\IIdent;


class LessThanEqualIdent implements IIdent
{
	public function name()
	{
		return ComparisonOperatorNames::LESS_THAN_EQUAL;
	}
}