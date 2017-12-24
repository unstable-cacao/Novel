<?php
namespace Novel\Symbols;


use Novel\Core\ISymbol;
use Novel\Consts\Symbols\PHPNames;
use Novel\Symbols\Base\AbstractSingleStringSymbol;


class PlainTextSymbol extends AbstractSingleStringSymbol implements ISymbol
{
	public function __construct(string $text)
	{
		parent::__construct($text);
	}
	
	
	public function name()
	{
		return PHPNames::PLAIN_TEXT;
	}
}