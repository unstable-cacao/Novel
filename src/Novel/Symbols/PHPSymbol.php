<?php
namespace Novel\Symbols;


use Novel\Consts\Symbols\PHPNames;
use Novel\Core\ISymbol;
use Novel\Symbols\Base\AbstractSingleStringSymbol;


class PHPSymbol extends AbstractSingleStringSymbol implements ISymbol
{
	public function __construct()
	{
		parent::__construct("<?php" . PHP_EOL);
	}
	
	
	public function name()
	{
		return PHPNames::PHP;
	}
}