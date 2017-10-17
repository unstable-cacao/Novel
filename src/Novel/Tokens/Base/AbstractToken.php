<?php
namespace Novel\Tokens\Base;


use Novel\Core\IToken;


abstract class AbstractToken implements IToken
{
	private $name;
	private $parent;
	
	
	public function __construct(string $name)
	{
		$this->name = $name;
	}


	public function name(): string
	{
		return $this->name;
	}

	public function parent(): ?IToken
	{
		return $this->parent;
	}
	
	public function setParent(?IToken $parent): void
	{
		$this->parent = $parent;
	}
	
	public function getIterator()
	{
		return new \ArrayIterator();
	}
}