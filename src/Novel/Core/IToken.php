<?php
namespace Novel\Core;


interface IToken
{
	public function parent(): ?IToken;
	
	public function setParent(?IToken $parent): void;
	
	
	public function count(): int;
	public function hasChildren(): bool;
	
	/**
	 * @return IToken[]
	 */
	public function children(): array;
}