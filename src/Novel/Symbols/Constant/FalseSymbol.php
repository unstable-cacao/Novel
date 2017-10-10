<?php
namespace Novel\Symbols\Constant;


use Novel\Consts\Symbols\ConstantNames;
use Novel\Core\ISymbol;
use Novel\Symbols\Base\AbstractSingleStringSymbol;


class FalseSymbol extends AbstractSingleStringSymbol implements ISymbol
{
	public function __construct()
	{
		parent::__construct("false");
	}
	
	
	public function name()
	{
		return ConstantNames::FALSE;
	}
}