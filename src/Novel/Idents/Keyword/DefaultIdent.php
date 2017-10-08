<?php
namespace Novel\Idents\Keyword;


use Novel\Consts\Idents\KeywordNames;
use Novel\Core\IIdent;


class DefaultIdent implements IIdent
{
	public function name()
	{
		return KeywordNames::DEFAULT;
	}
}