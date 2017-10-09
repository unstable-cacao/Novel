<?php
namespace Novel\Idents;


use Novel\Consts\Idents\PHPNames;
use Novel\Core\IIdent;
use Novel\Idents\Base\AbstractSingleStringIdent;


class ClosePHPIdent extends AbstractSingleStringIdent implements IIdent
{
	public function __construct()
	{
		parent::__construct(PHP_EOL . "?>");
	}
	
	
	public function name()
	{
		return PHPNames::CLOSE_PHP;
	}
}