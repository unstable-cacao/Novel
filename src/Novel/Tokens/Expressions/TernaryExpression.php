<?php
namespace Novel\Tokens\Expressions;


use Novel\Core\IToken;
use Novel\Core\Tokens\Expressions\IExpression;
use Novel\Core\Tokens\Expressions\ITernaryExpression;
use Novel\Tokens\Base\AbstractTreeToken;
use Novel\Consts\Tokens\OperationNames;


class TernaryExpression extends AbstractTreeToken implements ITernaryExpression
{
	public function __construct()
	{
		parent::__construct(OperationNames::TERNARY_EXPRESSION);
	}


	public function set(IExpression $condition, ?IExpression $trueValue, IExpression $falseValue)
	{
		if ($trueValue)
		{
			$this->setChildrenArray([$condition, $trueValue, $falseValue]);
		}
		else
		{
			$this->setChildrenArray([$condition, $falseValue]);
		}
	}
	
	public function condition(): ?IToken
	{
		return $this->children()[0] ?? null;
	}
	
	public function hasTrueValue(): bool
	{
		return $this->count() == 3;
	}
	
	public function trueValue(): ?IToken
	{
		return $this->hasTrueValue() ? $this->children()[1] : null;
	}
	
	public function falseValue(): ?IToken
	{
		return $this->hasTrueValue() ? $this->children()[2] : $this->children()[1];
	}
}