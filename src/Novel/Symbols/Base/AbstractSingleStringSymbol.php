<?php
namespace Novel\Symbols\Base;


abstract class AbstractSingleStringSymbol implements ISingleStringSymbol
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