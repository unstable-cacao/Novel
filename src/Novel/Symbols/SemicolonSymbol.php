<?php
namespace Novel\Symbols;


use Novel\Core\ISymbol;
use Novel\Consts\Symbols\PHPNames;
use Novel\Symbols\Base\AbstractSingleStringSymbol;


class SemicolonSymbol extends AbstractSingleStringSymbol implements ISymbol
{
	public function __construct()
	{
		parent::__construct(";");
	}
	
	
	public function name()
	{
		return PHPNames::SEMICOLON;
	}
}