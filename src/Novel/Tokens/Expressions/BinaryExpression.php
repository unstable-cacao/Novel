<?php
namespace Novel\Tokens\Expressions;


use Novel\Core\IToken;
use Novel\Consts\Tokens\OperationNames;
use Novel\Core\Tokens\Expressions\IBinaryExpression;
use Novel\Core\Tokens\Expressions\IExpression;
use Novel\Core\Tokens\Operators\IOperator;
use Novel\Tokens\Base\AbstractTreeToken;


class BinaryExpression extends AbstractTreeToken implements IBinaryExpression
{
	public function __construct()
	{
		parent::__construct(OperationNames::BINARY_EXPRESSION);
	}


	public function set(IExpression $left, IOperator $operator, IExpression $right)
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