<?php
namespace Novel\Tokens\Operators;


use Novel\Core\Tokens\Operators\IOperatorToken;
use Novel\Core\Tokens\Operators\ISingleOperatorToken;
use Novel\Tokens\Base\AbstractChildlessToken;


class AbstractSingleOperatorToken extends AbstractChildlessToken implements ISingleOperatorToken
{
	/** @var IOperatorToken */
	private $operator;
	
	
	public function __construct($operator = null)
	{
		if ($operator)
			$this->setOperator($operator);
	}


	public function getOperator(): ?string
	{
		return ($this->operator ? $this->operator->getOperator() : null);
	}

	public function getOperatorToken(): ?IOperatorToken
	{
		return $this->operator;
	}

	/**
	 * @param string|IOperatorToken $operator
	 */
	public function setOperator($operator): void
	{
		$this->operator = GenericOperatorToken::asOperator($operator);
	}
}