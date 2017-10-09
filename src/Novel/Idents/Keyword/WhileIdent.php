<?php
namespace Novel\Idents\Keyword;


use Novel\Consts\Idents\KeywordNames;
use Novel\Core\IIdent;
use Novel\Idents\Base\AbstractSingleStringIdent;


class WhileIdent extends AbstractSingleStringIdent implements IIdent
{
	public function __construct()
	{
		parent::__construct("while");
	}
	
	
	public function name()
	{
		return KeywordNames::WHILE;
	}
}