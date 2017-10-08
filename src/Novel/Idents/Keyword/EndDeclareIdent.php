<?php
namespace Novel\Idents\Keyword;


use Novel\Consts\Idents\KeywordNames;
use Novel\Core\IIdent;


class EndDeclareIdent implements IIdent
{
	public function name()
	{
		return KeywordNames::END_DECLARE;
	}
}