<?php
namespace Novel\Symbols\LogicOperator;


use Novel\Consts\Symbols\LogicOperatorNames;
use Novel\Core\ISymbol;
use Novel\Symbols\Base\AbstractSingleStringSymbol;


class OrSymbol extends AbstractSingleStringSymbol implements ISymbol
{
	public function __construct()
	{
		parent::__construct("||");
	}
	
	
	public function name()
	{
		return LogicOperatorNames::OR;
	}
}