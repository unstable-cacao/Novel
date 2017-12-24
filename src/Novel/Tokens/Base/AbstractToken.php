<?php
namespace Novel\Tokens\Base;


use Novel\Core\IToken;


abstract class AbstractToken implements IToken
{
	private $parent;
	

	public function parent(): ?IToken
	{
		return $this->parent;
	}
	
	public function setParent(?IToken $parent): void
	{
		$this->parent = $parent;
	}
	
	public function hasChildren(): bool
	{
		return (bool)$this->count();
	}
}