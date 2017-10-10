<?php
namespace Novel\Idents\Constant;


use Novel\Consts\Idents\ConstantNames;
use Novel\Core\IIdent;
use Novel\Idents\Base\AbstractSingleStringIdent;


class FloatIdent extends AbstractSingleStringIdent implements IIdent
{
	public function __construct()
	{
		parent::__construct("float");
	}
	
	
	public function name()
	{
		return ConstantNames::FLOAT;
	}
}