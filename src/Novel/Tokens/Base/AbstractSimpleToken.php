<?php
namespace Novel\Tokens\Base;


use Novel\Core\IToken;


abstract class AbstractSimpleToken implements IToken
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

	public function count(): int
	{
		return 0;
	}

	public function hasChildren(): bool
	{
		return false;
	}

	public function setParent(?IToken $parent): void
	{
		$this->parent = $parent;
	}

	/**
	 * @return IToken[]
	 */
	public function children(): array
	{
		return [];
	}
	
	public function getIterator()
	{
		return new \ArrayIterator();
	}
}