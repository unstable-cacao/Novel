<?php
namespace Novel\Symbols;


use Novel\Consts\Symbols\PHPNames;
use Novel\Core\ISymbol;


class ConstStringSymbol implements ISymbol
{
	/** @var string */
	private $value;
	
	
	public function __construct(string $value)
	{
		$this->value = $value;
	}
	
	
	public function name()
	{
		return PHPNames::CONST_STRING;
	}
	
	public function value(): string 
	{
		return $this->value;
	}
}