<?php
namespace Novel\Tokens\Expressions;


use Novel\Core\IToken;
use Novel\Consts\Tokens\OperationNames;
use Novel\Tokens\Base\AbstractToken;
use Novel\Tokens\Base\IExpressionToken;


class ForeachIterationExpression extends AbstractToken implements IExpressionToken
{
	/** @var IToken */
	private $traversable;
	
	/** @var IToken|null */
	private $key = null;
	
	/** @var IToken */
	private $value;
	
	
	public function __construct(IToken $traversable, ?IToken $key, IToken $value)
	{
		parent::__construct(OperationNames::FOREACH_ITERATION_EXPRESSION);
		
		$this->traversable = $this->setupChild($traversable);
		$this->value = $this->setupChild($value);
		
		if ($key)
		{
			$this->key = $this->setupChild($key);
		}
	}
	
	
	public function traversable(): IToken
	{
		return $this->traversable;
	}
	
	public function key(): ?IToken
	{
		return $this->key;
	}
	
	public function value(): IToken
	{
		return $this->value;
	}
}