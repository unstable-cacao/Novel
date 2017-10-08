<?php
namespace Novel\Tokens\Base;


use Novel\Core\IToken;


abstract class AbstractToken implements IToken
{
	private $name;
	private $parent;
	private $children = [];
	
	
	protected function setChildrenArray(array $children): void
	{
		$this->children = $children;
	}
	
	protected function addChildrenToArray($children): void
	{
		if (is_array($children))
		{
			$this->children = array_merge($this->children, $children);
		}
		else
		{
			$this->children[] = $children;
		}
	}
	
	
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
		return count($this->children);
	}

	public function hasChildren(): bool
	{
		return (bool)$this->children;
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
		return $this->children;
	}
	
	public function getIterator()
	{
		return new \ArrayIterator($this->children);
	}
}