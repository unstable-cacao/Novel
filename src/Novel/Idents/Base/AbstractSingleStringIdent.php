<?php
namespace Novel\Idents\Base;


abstract class AbstractSingleStringIdent implements ISingleStringIdent
{
	/** @var string */
	private $string;
	
	
	public function __construct(string $string)
	{
		$this->string = $string;
	}
	
	
	public function getSymbol(): string
	{
		return $this->string;
	}
}