<?php
namespace Novel\Idents\LogicOperator;


use Novel\Consts\Idents\LogicOperatorNames;
use Novel\Core\IIdent;
use Novel\Idents\Base\AbstractSingleStringIdent;


class NegateIdent extends AbstractSingleStringIdent implements IIdent
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