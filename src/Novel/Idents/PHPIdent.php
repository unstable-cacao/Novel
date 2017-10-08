<?php
namespace Novel\Idents;


use Novel\Consts\Idents\PHPNames;
use Novel\Core\IIdent;


class PHPIdent implements IIdent
{
	public function name()
	{
		return PHPNames::PHP;
	}
}