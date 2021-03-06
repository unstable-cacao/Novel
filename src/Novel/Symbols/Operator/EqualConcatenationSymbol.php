<?php
namespace Novel\Symbols\Operator;


use Novel\Consts\Symbols\OperatorNames;
use Novel\Core\ISymbol;
use Novel\Symbols\Base\AbstractSingleStringSymbol;


class EqualConcatenationSymbol extends AbstractSingleStringSymbol implements ISymbol
{
	public function __construct()
	{
		parent::__construct(".=");
	}
	
	
	public function name()
	{
		return OperatorNames::EQUAL_CONCATENATION;
	}
}