<?php
namespace Novel\Tokens\ClassName;


use Novel\Core\IToken;
use Novel\Core\Tokens\INameToken;
use Novel\Core\Tokens\ClassName\IUseNamespaceToken;
use Novel\Tokens\NameToken;


class UseNamespaceToken extends AbstractClassNameToken implements IUseNamespaceToken
{
	/** @var INameToken */
	private $as = null;
	

	public function count(): int
	{
		$count = count($this->getPartTokens());
		
		if ($this->as)
			$count++;
		
		return $count;
	}

	/**
	 * @return IToken[]
	 */
	public function children(): array
	{
		if ($this->as)
		{
			return array_merge(
				$this->getPartTokens(),
				$this->as
			);
		}
		else 
		{
			return $this->getPartTokens();
		}
	}

	/**
	 * @param string|INameToken $as
	 */
	public function setAs($as): void
	{
		$this->as = NameToken::getNameToken($as);
	}

	public function getAs(): ?string
	{
		return $this->as ? $this->as->getName() : null;
	}

	public function getAsToken(): ?INameToken
	{
		return $this->as;
	}

	public function hasAs(): bool
	{
		return (bool)$this->as;
	}
}