<?php
namespace Novel\Symbols\Constant;


use Novel\Consts\Symbols\ConstantNames;
use Novel\Core\ISymbol;
use Novel\Symbols\Base\AbstractSingleStringSymbol;


class NullSymbol extends AbstractSingleStringSymbol implements ISymbol
{
	public function __construct()
	{
		parent::__construct("null");
	}
	
	
	public function name()
	{
		return ConstantNames::NULL;
	}
}