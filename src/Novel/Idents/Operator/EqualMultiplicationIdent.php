<?php
namespace Novel\Idents\Operator;


use Novel\Consts\Idents\OperatorNames;
use Novel\Core\IIdent;
use Novel\Idents\Base\AbstractSingleStringIdent;


class EqualMultiplicationIdent extends AbstractSingleStringIdent implements IIdent
{
	public function __construct()
	{
		parent::__construct("*=");
	}
	
	
	public function name()
	{
		return OperatorNames::EQUAL_MULTIPLICATION;
	}
}