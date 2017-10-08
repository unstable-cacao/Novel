<?php
namespace Novel\Idents\Keyword;


use Novel\Consts\Idents\KeywordNames;
use Novel\Core\IIdent;


class AndIdent implements IIdent
{
	public function name()
	{
		return KeywordNames::AND;
	}
}