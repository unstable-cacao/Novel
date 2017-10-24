<?php
namespace Novel\Tokens\Utils;


use Novel\Core\Tokens\IName;


class ConstNameObject implements IName
{
	private $name;
	
	
	public function __construct(string $name)
	{
	}


	public function get(): string
	{
		// TODO: Implement get() method.
	}
}