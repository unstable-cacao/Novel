<?php
namespace Novel\Idents\Keyword;


use Novel\Consts\Idents\KeywordNames;
use Novel\Core\IIdent;
use Novel\Idents\Base\AbstractSingleStringIdent;


class FunctionIdent extends AbstractSingleStringIdent implements IIdent
{
	public function __construct()
	{
		parent::__construct("function");
	}
	
	
	public function name()
	{
		return KeywordNames::FUNCTION;
	}
}