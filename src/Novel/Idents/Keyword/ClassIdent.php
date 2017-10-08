<?php
namespace Novel\Idents\Keyword;


use Novel\Consts\Idents\KeywordNames;
use Novel\Core\IIdent;


class ClassIdent implements IIdent
{
	public function name()
	{
		return KeywordNames::CLASS_NAME;
	}
}