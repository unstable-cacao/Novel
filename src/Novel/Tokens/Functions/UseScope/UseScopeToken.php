<?php
namespace Novel\Tokens\Functions\UseScope;


use Novel\Core\IToken;
use Novel\Core\Tokens\Functions\UseScope\IUseScopeToken;
use Novel\Core\Tokens\INamedToken;
use Novel\Tokens\Base\AbstractToken;


class UseScopeToken extends AbstractToken implements IUseScopeToken
{
	/** @var IToken[] */
	private $children = [];
	
	
	public function count(): int
	{
		return count($this->children);
	}
	
	/**
	 * @return IToken[]
	 */
	public function children(): array
	{
		return $this->children;
	}
	
	/**
	 * @param INamedToken|INamedToken[]|string|string[] $item
	 */
	public function add(...$item): void
	{
		foreach ($item as $token) 
		{
			if (is_array($token))
			{
				foreach ($token as $singleToken) 
				{
					$this->add($singleToken);
				}
			}
			else if (!($token instanceof INamedToken) && !is_string($token))
			{
				throw new \Exception("Item must be string, INamedToken or array of the above");
			}
			else
			{
				if (is_string($token))
				{
					$token = new UseItemToken($token);
				}
				
				$token->setParent($this);
				$this->children[] = $token;
			}
		}
	}
}