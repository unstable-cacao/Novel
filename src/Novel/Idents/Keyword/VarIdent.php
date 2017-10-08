<?php
namespace Novel\Idents\Keyword;


use Novel\Consts\Idents\KeywordNames;
use Novel\Core\IIdent;


class VarIdent implements IIdent
{
	public function name()
	{
		return KeywordNames::VAR;
	}
}