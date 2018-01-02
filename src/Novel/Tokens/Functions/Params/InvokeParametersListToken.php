<?php
namespace Novel\Tokens\Functions\Params;


use Novel\Core\IToken;
use Novel\Core\Tokens\Functions\Params\IInvokeParametersListToken;
use Novel\Core\Tokens\Generic\IValueExpressionToken;
use Novel\Tokens\Base\AbstractToken;


class InvokeParametersListToken extends AbstractToken implements IInvokeParametersListToken
{
	/** @var IToken[] */
	private $children = [];
	
	
	/**
	 * @param IToken[]|IToken ...$item
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
			else if ($token instanceof IToken)
			{
				$token->setParent($this);
				$this->children[] = $token;
			}
			else
			{
				throw new \Exception("Item must be token or array of tokens");
			}
		}
	}
	
	public function set(int $index, IValueExpressionToken $item): void
	{
		$this->children[$index] = $item;
	}
	
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
}