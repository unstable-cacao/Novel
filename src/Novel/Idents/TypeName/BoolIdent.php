<?php
namespace Novel\Idents\TypeName;


use Novel\Consts\Idents\TypeNames;
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
		return TypeNames::BOOL;
	}
}