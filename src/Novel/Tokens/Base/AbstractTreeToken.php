<?php
namespace Novel\Tokens\Base;


use Novel\Core\IToken;


abstract class AbstractTreeToken implements IToken
{
	private $name;
	private $parent;
	private $children = [];


	/**
	 * @param string|IToken $token
	 * @return IToken
	 */
	protected function setupChild($token): IToken
	{
		if (is_string($token))
		{
			/** @var IToken $token */
			$token = new $token;
		}
		
		$token->setParent($this);
		return $token;
	}
	
	protected function setChildrenArray(array $children): void
	{
		$this->children = $children;
	}
	
	protected function setChild(int $index, IToken $child): void
	{
		$child->setParent($this);
		$this->children[$index] = $child;
	}
	
	protected function addChildrenToArray($children): void
	{
		if (is_array($children))
		{
			foreach ($children as $child)
			{
				$this->addChildrenToArray($children);
			}
		}
		else
		{
			/** @var IToken $children */
			$children->setParent($this);
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