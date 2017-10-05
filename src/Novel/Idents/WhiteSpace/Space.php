<?php
namespace Novel\Idents\WhiteSpace;


use Novel\Consts\Idents\WhiteSpaceNames;
use Novel\Core\IIdent;


class Space implements IIdent
{
	public function name(): string
	{
		return WhiteSpaceNames::SPACE;
	}
}