<?php
namespace Novel\Idents\Keyword;


use Novel\Consts\Idents\KeywordNames;
use Novel\Core\IIdent;


class EndForeachIdent implements IIdent
{
	public function name()
	{
		return KeywordNames::END_FOREACH;
	}
}