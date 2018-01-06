<?php
namespace Novel\Tokens\Operators;


use Novel\Core\Tokens\Operators\IOperatorToken;
use Novel\Tokens\Base\AbstractChildlessToken;


class GenericOperatorToken extends AbstractChildlessToken implements IOperatorToken
{
	private $operator;
	
	
	public function __construct(string $operator)
	{
		$this->operator = $operator;
	}


	public function getOperator(): string
	{
		return $this->operator;
	}
	
	
	public static function asOperator($item): IOperatorToken
	{
		if ($item instanceof IOperatorToken)
			return $item;
		
		return new GenericOperatorToken($item);
	}
}