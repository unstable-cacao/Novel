<?php
namespace Novel\Idents\Keyword;


use Novel\Consts\Idents\KeywordNames;
use Novel\Core\IIdent;


class ForIdent implements IIdent
{
	public function name()
	{
		return KeywordNames::FOR;
	}
}