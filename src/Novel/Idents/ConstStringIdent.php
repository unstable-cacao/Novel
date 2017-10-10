<?php
namespace Novel\Idents;


use Novel\Consts\Idents\PHPNames;
use Novel\Core\IIdent;


class ConstStringIdent implements IIdent
{
	public function name()
	{
		return PHPNames::CONST_STRING;
	}
}