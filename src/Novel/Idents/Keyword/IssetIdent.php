<?php
namespace Novel\Idents\Keyword;


use Novel\Consts\Idents\KeywordNames;
use Novel\Core\IIdent;


class IssetIdent implements IIdent
{
	public function name()
	{
		return KeywordNames::ISSET;
	}
}