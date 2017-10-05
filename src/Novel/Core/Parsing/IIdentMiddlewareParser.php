<?php
namespace Novel\Core\Parsing;


use Novel\Core\IIdent;


interface IIdentMiddlewareParser extends IIdentParsingObject
{
	public function parse(IIdent $ident, callable $next): ?string;
}