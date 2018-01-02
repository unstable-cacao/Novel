<?php
namespace Novel\Tokens\FlowControl\ForeachStatement;


use Novel\Core\IToken;
use Novel\Core\Tokens\FlowControl\ForeachStatement\IForeachProductToken;
use Novel\Core\Tokens\INamedToken;
use Novel\Tokens\Base\AbstractChildlessToken;
use Novel\Tokens\Reference\NamedVariableToken;


class ForeachProductToken extends AbstractChildlessToken implements IForeachProductToken
{
	/** @var INamedToken|null */
	private $key;
	
	/** @var IToken */
	private $item;
	
	
	/**
	 * @param string|INamedToken|null $item
	 */
	public function setKey($item = null): void
	{
		if (is_string($item))
		{
			$item = new NamedVariableToken($item);
		}
		
		if (!($item instanceof INamedToken) && !is_null($item))
			throw new \Exception("Item can be null, string or INamedToken only");
		
		$this->key = $item;
	}
	
	public function hasKey(): bool
	{
		return $this->key ? true : false;
	}
	
	public function getKey(): ?INamedToken
	{
		return $this->key;
	}
	
	/**
	 * @param string|IToken $item
	 */
	public function setItem($item): void
	{
		if (is_string($item))
		{
			$item = new NamedVariableToken($item);
		}
		
		if (!($item instanceof IToken))
			throw new \Exception("Item can be string or IToken only");
		
		$this->item = $item;
	}
	
	public function getItem(): IToken
	{
		return $this->item;
	}
}