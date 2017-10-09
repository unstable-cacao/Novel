<?php
namespace Novel\Idents\Keyword;


use Novel\Consts\Idents\KeywordNames;
use Novel\Core\IIdent;
use Novel\Idents\Base\AbstractSingleStringIdent;


class ArrayConstructorIdent extends AbstractSingleStringIdent implements IIdent
{
	public function __construct()
	{
		parent::__construct("array");
	}
	
	
	public function name()
	{
		return KeywordNames::ARRAY_CONSTRUCTOR;
	}
}