<?php
namespace Novel\Core\Parsing;


use Novel\Core\IIdent;


interface IIdentParser
{
	public function parse(IIdent $ident): ?string;
}