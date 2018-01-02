<?php
namespace Novel\Tokens\FlowControl\ForeachStatement;


use Novel\Core\IToken;
use Novel\Core\Tokens\FlowControl\ForeachStatement\IForeachIterationToken;
use Novel\Core\Tokens\FlowControl\ForeachStatement\IForeachProductToken;
use Novel\Tokens\Base\AbstractChildlessToken;
use Novel\Tokens\Reference\NamedVariableToken;


class ForeachIterationToken extends AbstractChildlessToken implements IForeachIterationToken
{
	/** @var IToken */
	private $target;
	
	/** @var IForeachProductToken */
	private $product;
	
	
	/**
	 * @param string|IToken $target
	 */
	public function setTarget($target): void
	{
		if (is_string($target))
		{
			$target = new NamedVariableToken($target);
		}
		
		if (!($target instanceof IToken))
			throw new \Exception("Target can be string or IToken only");
		
		$this->target = $target;
	}
	
	public function getTarget(): IToken
	{
		return $this->target;
	}
	
	/**
	 * @param string|IToken $item
	 * @param string|IToken|null $value If set, $item treated as key and $value as value of the product.
	 */
	public function setProduct($item, $value = null): void
	{
		$token = new ForeachProductToken();
		
		if ($value)
		{
			$token->setKey($item);
			$token->setItem($value);
		}
		else 
		{
			$token->setItem($item);
		}
		
		$this->product = $token;
	}
	
	public function setProductToken(IForeachProductToken $token): void
	{
		$this->product = $token;
	}
	
	public function getProductToken(): IForeachProductToken
	{
		return $this->product;
	}
	
	public function hasKey(): bool
	{
		return $this->product->hasKey();
	}
}