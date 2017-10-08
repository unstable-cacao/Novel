<?php
namespace Novel\Idents\Keyword;


use Novel\Consts\Idents\KeywordNames;
use Novel\Core\IIdent;


class TryIdent implements IIdent
{
	public function name()
	{
		return KeywordNames::TRY;
	}
}