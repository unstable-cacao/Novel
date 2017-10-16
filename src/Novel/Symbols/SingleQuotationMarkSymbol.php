<?php
namespace Novel\Symbols;


use Novel\Consts\Symbols\PHPNames;
use Novel\Core\ISymbol;
use Novel\Symbols\Base\AbstractSingleStringSymbol;


class SingleQuotationMarkSymbol extends AbstractSingleStringSymbol implements ISymbol
{
	public function __construct()
	{
		parent::__construct('\'');
	}
	
	
	public function name()
	{
		return PHPNames::SINGLE_QUOTATION_MARK;
	}
}