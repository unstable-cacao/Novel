<?php
namespace Novel\Idents;


use Novel\Consts\Idents\PHPNames;
use Novel\Core\IIdent;


class PlainTextIdent implements IIdent
{
	public function name()
	{
		return PHPNames::PLAIN_TEXT;
	}
}