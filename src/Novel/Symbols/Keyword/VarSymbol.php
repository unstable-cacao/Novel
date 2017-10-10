<?php
namespace Novel\Symbols\Keyword;


use Novel\Consts\Symbols\KeywordNames;
use Novel\Core\ISymbol;
use Novel\Symbols\Base\AbstractSingleStringSymbol;


class VarSymbol extends AbstractSingleStringSymbol implements ISymbol
{
	public function __construct()
	{
		parent::__construct("var");
	}
	
	
	public function name()
	{
		return KeywordNames::VAR;
	}
}