<?php
namespace Novel\Idents\Constant;


use Novel\Consts\Idents\ConstantNames;
use Novel\Core\IIdent;
use Novel\Idents\Base\AbstractSingleStringIdent;


class BoolIdent extends AbstractSingleStringIdent implements IIdent
{
	public function __construct()
	{
		parent::__construct("bool");
	}
	
	
	public function name()
	{
		return ConstantNames::BOOL;
	}
}