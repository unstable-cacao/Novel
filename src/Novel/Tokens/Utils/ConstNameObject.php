<?php
namespace Novel\Tokens\Utils;


use Novel\Core\Tokens\IName;


class ConstNameObject implements IName
{
	private $name;
	
	
	public function __construct(string $name)
	{
		$this->name = $name;
	}
	

	public function get(): string
	{
		return $this->name;
	}
}