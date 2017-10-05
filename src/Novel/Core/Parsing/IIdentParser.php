<?php
namespace Novel\Core\Parsing;


use Novel\Core\IIdent;


interface IIdentParser extends IIdentParsingObject
{
	public function parse(IIdent $ident): ?string;
}