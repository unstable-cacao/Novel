<?php
namespace Novel\Idents\Keyword;


use Novel\Consts\Idents\KeywordNames;
use Novel\Core\IIdent;


class EndForIdent implements IIdent
{
	public function name()
	{
		return KeywordNames::END_FOR;
	}
}