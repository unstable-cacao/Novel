<?php
namespace Novel\Idents;


use Novel\Consts\Idents\PHPNames;
use Novel\Core\IIdent;


class ClosePHPIdent implements IIdent
{
	public function name()
	{
		return PHPNames::CLOSE_PHP;
	}
}