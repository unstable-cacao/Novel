<?php
namespace Novel\Tokens\Expressions;


use Novel\Core\IToken;
use Novel\Consts\Tokens\OperationNames;
use Novel\Tokens\Base\AbstractToken;
use Novel\Tokens\Base\IOperatorToken;
use Novel\Tokens\Base\IExpressionToken;


class BinaryExpression extends AbstractToken implements IExpressionToken
{
	public function __construct()
	{
		parent::__construct(OperationNames::BINARY_EXPRESSION);
	}


	public function set(IExpressionToken $left, IOperatorToken $operator, IExpressionToken $right)
	{
		$this->setChildrenArray([$left, $operator, $right]);
	}
	
	public function left(): ?IToken
	{
		return $this->children()[0] ?? null;
	}
	
	public function operator(): ?IToken
	{
		return $this->children()[1] ?? null;
	}
	
	public function right(): ?IToken
	{
		return $this->children()[2] ?? null;
	}
}