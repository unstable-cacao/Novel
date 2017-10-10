<?php
namespace Novel\Symbols\Keyword;


use Novel\Consts\Symbols\KeywordNames;
use Novel\Core\ISymbol;
use Novel\Symbols\Base\AbstractSingleStringSymbol;


class PrivateSymbol extends AbstractSingleStringSymbol implements ISymbol
{
	public function __construct()
	{
		parent::__construct("private");
	}
	
	
	public function name()
	{
		return KeywordNames::PRIVATE;
	}
}