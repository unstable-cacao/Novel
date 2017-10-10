<?php
namespace Novel\Symbols\Keyword;


use Novel\Consts\Symbols\KeywordNames;
use Novel\Core\ISymbol;
use Novel\Symbols\Base\AbstractSingleStringSymbol;


class UnsetSymbol extends AbstractSingleStringSymbol implements ISymbol
{
	public function __construct()
	{
		parent::__construct("unset");
	}
	
	
	public function name()
	{
		return KeywordNames::UNSET;
	}
}