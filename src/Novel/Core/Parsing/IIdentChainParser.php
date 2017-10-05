<?php
namespace Novel\Core\Parsing;


use Novel\Core\IIdent;


interface IIdentChainParser extends IIdentParsingObject
{
	public function preParse(IIdent $ident): ?string;
	public function postParse(IIdent $ident): ?string;
}