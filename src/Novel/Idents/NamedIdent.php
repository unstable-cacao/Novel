<?php
namespace Novel\Idents;


use Novel\Consts\Idents\PHPNames;
use Novel\Core\IIdent;


class NamedIdent implements IIdent
{
	public function name()
	{
		return PHPNames::NAMED;
	}
}