<?php
namespace Novel\Idents\ComparisonOperator;


use Novel\Consts\Idents\ComparisonOperatorNames;
use Novel\Core\IIdent;


class NotIdenticalIdent implements IIdent
{
	public function name()
	{
		return ComparisonOperatorNames::NOT_IDENTICAL;
	}
}