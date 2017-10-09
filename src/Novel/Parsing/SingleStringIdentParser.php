<?php
namespace Novel\Parsing;


use Novel\Core\IIdent;
use Novel\Core\Parsing\IIdentParser;
use Novel\Idents\Base\AbstractSingleStringIdent;


class SingleStringIdentParser implements IIdentParser
{
	public function parse(IIdent $ident): ?string
	{
		if ($ident instanceof AbstractSingleStringIdent)
		{
			return $ident->getSymbol();
		}
		
		return null;
	}
}