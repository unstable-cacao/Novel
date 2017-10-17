<?php
namespace Novel\Core;


interface IToken extends \IteratorAggregate
{
	public function name(): string;
	public function parent(): ?IToken;
	
	public function setParent(?IToken $parent): void;
}