<?php
namespace Novel\Idents\WhiteSpace;


use Novel\Consts\Idents\WhiteSpaceNames;
use Novel\Core\IIdent;


class TabIdent implements IIdent
{
	public function name()
	{
		return WhiteSpaceNames::TAB;
	}
}