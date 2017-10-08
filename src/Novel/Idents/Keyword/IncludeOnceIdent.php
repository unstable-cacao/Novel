<?php
namespace Novel\Idents\Keyword;


use Novel\Consts\Idents\KeywordNames;
use Novel\Core\IIdent;


class IncludeOnceIdent implements IIdent
{
	public function name()
	{
		return KeywordNames::INCLUDE_ONCE;
	}
}