<?php
namespace Novel\Idents\Keyword;


use Novel\Consts\Idents\KeywordNames;
use Novel\Core\IIdent;


class UseIdent implements IIdent
{
	public function name()
	{
		return KeywordNames::USE;
	}
}