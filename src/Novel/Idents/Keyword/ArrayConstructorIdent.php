<?php
namespace Novel\Idents\Keyword;


use Novel\Consts\Idents\KeywordNames;
use Novel\Core\IIdent;


class ArrayConstructorIdent implements IIdent
{
	public function name()
	{
		return KeywordNames::ARRAY_CONSTRUCTOR;
	}
}