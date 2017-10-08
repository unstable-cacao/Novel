<?php
namespace Novel\Idents\Keyword;


use Novel\Consts\Idents\KeywordNames;
use Novel\Core\IIdent;


class InstanceOfIdent implements IIdent
{
	public function name()
	{
		return KeywordNames::INSTEAD_OF;
	}
}