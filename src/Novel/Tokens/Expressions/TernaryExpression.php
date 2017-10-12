<?php
namespace Novel\Tokens\Expressions;


use Novel\Core\IToken;
use Novel\Tokens\Base\AbstractToken;
use Novel\Tokens\Base\IExpressionToken;
use Novel\Consts\Tokens\OperationNames;


class TernaryExpression extends AbstractToken implements IExpressionToken
{
	public function __construct()
	{
		parent::__construct(OperationNames::TERNARY_EXPRESSION);
	}


	public function set(IExpressionToken $condition, ?IExpressionToken $trueValue, IExpressionToken $falseValue)
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