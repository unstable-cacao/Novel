<?php
namespace Novel\Idents\Keyword;


use Novel\Consts\Idents\KeywordNames;
use Novel\Core\IIdent;
use Novel\Idents\Base\AbstractSingleStringIdent;


class EndForIdent extends AbstractSingleStringIdent implements IIdent
{
	public function __construct()
	{
		parent::__construct("endfor");
	}
	
	
	public function name()
	{
		return KeywordNames::END_FOR;
	}
}