<?php
namespace Novel\Symbols\Keyword;


use Novel\Consts\Symbols\KeywordNames;
use Novel\Core\ISymbol;
use Novel\Symbols\Base\AbstractSingleStringSymbol;


class ImplementsSymbol extends AbstractSingleStringSymbol implements ISymbol
{
	public function __construct()
	{
		parent::__construct("implements");
	}
	
	
	public function name()
	{
		return KeywordNames::IMPLEMENTS;
	}
}