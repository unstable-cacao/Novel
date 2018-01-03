<?php
namespace Novel\Tokens\Base;


use Novel\Core\IToken;


class AbstractParentToken extends AbstractToken implements IToken
{
	private $children = [];


	/**
	 * @param IToken|IToken[] $children
	 */
	protected function addChildren($children): void
	{
		if (!is_array($children))
			$children = [$children];
		
		foreach ($children as $child) 
		{
			$child->setParent($this);
		}
		
		$this->children = array_merge($this->children, $children);
	}
	
	
	public function count(): int
	{
		return count($this->children);
	}

	public function hasChildren(): bool
	{
		return (bool)$this->children;
	}

	/**
	 * @return IToken[]
	 */
	public function children(): array
	{
		return $this->children;
	}
}