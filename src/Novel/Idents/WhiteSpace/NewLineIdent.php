<?php
namespace Novel\Idents\WhiteSpace;


use Novel\Consts\Idents\WhiteSpaceNames;
use Novel\Core\IIdent;


class NewLineIdent implements IIdent
{
	public function name()
	{
		return WhiteSpaceNames::NEW_LINE;
	}
}