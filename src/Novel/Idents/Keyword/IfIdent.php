<?php
namespace Novel\Idents\Keyword;


use Novel\Consts\Idents\KeywordNames;
use Novel\Core\IIdent;


class IfIdent implements IIdent
{
	public function name()
	{
		return KeywordNames::IF;
	}
}