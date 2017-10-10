<?php
namespace Novel\Symbols\Constant;


use Novel\Consts\Symbols\ConstantNames;
use Novel\Core\ISymbol;
use Novel\Symbols\Base\AbstractSingleStringSymbol;


class IntSymbol extends AbstractSingleStringSymbol implements ISymbol
{
	public function __construct()
	{
		parent::__construct("int");
	}
	
	
	public function name()
	{
		return ConstantNames::INT;
	}
}