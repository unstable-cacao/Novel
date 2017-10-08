<?php
namespace Novel\Core;


interface IToken extends \Iterator
{
	public function name(): string;
	public function parent(): ?IToken;
	
	public function count(): int;
	public function hasChildren(): bool;
	
	public function setParent(?IToken $parent): void;
	
	/**
	 * @return IToken[]
	 */
	public function children(): array;
}