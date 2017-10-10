<?php
namespace Novel\Symbols\LogicOperator;


use Novel\Consts\Symbols\LogicOperatorNames;
use Novel\Core\ISymbol;
use Novel\Symbols\Base\AbstractSingleStringSymbol;


class NegateSymbol extends AbstractSingleStringSymbol implements ISymbol
{
	public function __construct()
	{
		parent::__construct("!");
	}
	
	
	public function name()
	{
		return LogicOperatorNames::NEGATE;
	}
}