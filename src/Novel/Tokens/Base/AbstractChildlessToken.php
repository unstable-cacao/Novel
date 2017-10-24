<?php
namespace Novel\Tokens\Base;


use Novel\Core\IToken;


abstract class AbstractChildlessToken extends AbstractToken
{
	public function count(): int
	{
		return 0;
	}

	public function hasChildren(): bool
	{
		return false;
	}

	/**
	 * @return IToken[]
	 */
	public function children(): array
	{
		return [];
	}
}