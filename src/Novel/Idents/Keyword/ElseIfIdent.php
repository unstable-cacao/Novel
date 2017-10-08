<?php
namespace Novel\Idents\Keyword;


use Novel\Consts\Idents\KeywordNames;
use Novel\Core\IIdent;


class ElseIfIdent implements IIdent
{
	public function name()
	{
		return KeywordNames::ELSE_IF;
	}
}