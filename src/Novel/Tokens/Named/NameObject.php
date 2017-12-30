<?php
namespace Novel\Tokens\Named;


use Novel\Core\Tokens\IName;


class NameObject implements IName
{
	/** @var string */
	private $name;
	
	
	public function __construct(string $name)
	{
		$this->name = $name;
	}
	
	
	public function get(): string
	{
		return $this->name;
	}
	
	public function set(string $name): void
	{
		$this->name = $name;
	}
}