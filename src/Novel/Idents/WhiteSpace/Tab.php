<?php
namespace Novel\Idents\WhiteSpace;


use Novel\Consts\Idents\WhiteSpaceNames;
use Novel\Core\IIdent;


class Tab implements IIdent
{
	public function name()
	{
		return WhiteSpaceNames::TAB;
	}
}