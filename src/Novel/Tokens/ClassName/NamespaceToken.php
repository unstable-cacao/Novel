<?php
namespace Novel\Tokens\ClassName;


use Novel\Core\IToken;
use Novel\Core\Tokens\ClassName\INamespaceToken;


class NamespaceToken extends AbstractClassNameToken implements INamespaceToken
{
	public function count(): int
	{
		return count($this->getPartTokens());
	}
	
	/**
	 * @return IToken[]
	 */
	public function children(): array
	{
		return $this->getPartTokens();
	}
}