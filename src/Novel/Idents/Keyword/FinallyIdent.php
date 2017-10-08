<?php
namespace Novel\Idents\Keyword;


use Novel\Consts\Idents\KeywordNames;
use Novel\Core\IIdent;


class FinallyIdent implements IIdent
{
	public function name()
	{
		return KeywordNames::FINALLY;
	}
}