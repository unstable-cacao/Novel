<?php
namespace Novel\Idents\Keyword;


use Novel\Consts\Idents\KeywordNames;
use Novel\Core\IIdent;


class EmptyIdent implements IIdent
{
	public function name()
	{
		return KeywordNames::EMPTY;
	}
}