<?php
namespace Novel\Idents;


use Novel\Consts\Idents\PHPNames;
use Novel\Core\IIdent;
use Novel\Idents\Base\AbstractSingleStringIdent;


class DoubleQuotationMarkIdent extends AbstractSingleStringIdent implements IIdent
{
	public function __construct()
	{
		parent::__construct('"');
	}
	
	
	public function name()
	{
		return PHPNames::DOUBLE_QUOTATION_MARK;
	}
}