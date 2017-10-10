<?php
namespace Novel\Idents\Constant;


use Novel\Consts\Idents\ConstantNames;
use Novel\Core\IIdent;
use Novel\Idents\Base\AbstractSingleStringIdent;


class FalseIdent extends AbstractSingleStringIdent implements IIdent
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