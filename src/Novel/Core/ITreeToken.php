<?php
namespace Novel\Core;


interface ITreeToken extends IToken
{
	public function count(): int;
	public function hasChildren(): bool;
	
	/**
	 * @return IToken[]
	 */
	public function children(): array;
}