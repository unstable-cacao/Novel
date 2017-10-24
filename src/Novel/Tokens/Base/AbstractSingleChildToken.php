<?php
namespace Novel\Tokens\Base;


abstract class AbstractSingleChildToken extends AbstractToken
{
	public function count(): int
	{
		return 1;
	}

	public function hasChildren(): bool
	{
		return true;
	}
}