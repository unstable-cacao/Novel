<?php
namespace Novel\Idents;


use Novel\Consts\Idents\PHPNames;
use Novel\Core\IIdent;


class StringExpressionTextIdent implements IIdent
{
	public function name()
	{
		return PHPNames::STRING_EXPRESSION_TEXT;
	}
}