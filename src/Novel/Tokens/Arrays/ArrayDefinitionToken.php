<?php
namespace Novel\Tokens\Arrays;


use Novel\Core\IToken;
use Novel\Core\Tokens\Arrays\IArrayDefinitionToken;
use Novel\Core\Tokens\Arrays\IKeyValueToken;
use Novel\Core\Tokens\Generic\IValueExpression;
use Novel\Tokens\Base\AbstractToken;
use Novel\Tokens\ConstValueToken;


class ArrayDefinitionToken extends AbstractToken implements IArrayDefinitionToken
{
	/** @var IToken[] */
	private $children;
	
	
	/**
	 * @param array|IKeyValueToken|IValueExpression|mixed $item
	 */
	public function addItems($item): void
	{
		if (is_array($item))
		{
			foreach ($item as $value) 
			{
				$this->addItems($value);
			}
		}
		else if ($item instanceof IKeyValueToken || $item instanceof IValueExpression)
		{
			$item->setParent($this);
			$this->children[] = $item;
		}
		else
		{
			if (!is_scalar($item) && !is_null($item))
				throw new \Exception("Item must be scalar, null, array or instance of IKeyValueToken or IValueExpression");
			
			$item = new ConstValueToken($item);
			$item->setParent($this);
			$this->children[] = $item;
		}
	}
	
	public function count(): int
	{
		return count($this->children);
	}
	
	public function hasChildren(): bool
	{
		return $this->children ? true : false;
	}
	
	/**
	 * @return IToken[]
	 */
	public function children(): array
	{
		return $this->children;
	}
}