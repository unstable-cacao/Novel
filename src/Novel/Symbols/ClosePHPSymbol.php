<?php
namespace Novel\Symbols;


use Novel\Consts\Symbols\PHPNames;
use Novel\Core\ISymbol;
use Novel\Symbols\Base\AbstractSingleStringSymbol;


class ClosePHPSymbol extends AbstractSingleStringSymbol implements ISymbol
{
	public function __construct()
	{
		parent::__construct(PHP_EOL . "?>");
	}
	
	
	public function name()
	{
		return PHPNames::CLOSE_PHP;
	}
}