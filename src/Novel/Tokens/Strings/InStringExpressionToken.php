<?php
namespace Novel\Tokens\Strings;


use Novel\Core\IToken;
use Novel\Core\Tokens\Generic\IValueExpressionToken;
use Novel\Core\Tokens\Strings\IInStringExpressionToken;
use Novel\Tokens\Base\AbstractSingleChildToken;


class InStringExpressionToken extends AbstractSingleChildToken implements IInStringExpressionToken
{
	/** @var IValueExpressionToken */
	private $expression;
	
	
	public function setExpression(IValueExpressionToken $token): void
	{
		$token->setParent($this);
		$this->expression = $token;
	}
	
	public function getExpression(): IValueExpressionToken
	{
		return $this->expression;
	}
	
	/**
	 * @return IToken[]
	 */
	public function children(): array
	{
		return [$this->expression];
	}
}