<?php
namespace Novel\Tokens\Operators;


use Novel\Core\IToken;
use Novel\Core\Tokens\Operators\IParenthesesExpressionToken;
use Novel\Tokens\Base\AbstractChildlessToken;


class ParenthesesExpressionToken extends AbstractChildlessToken implements IParenthesesExpressionToken
{
	private $target; 

	
	public function __construct(IToken $target)
	{
		$this->target = $target;
	}


	public function setTarget(IToken $target): void
	{
		$this->target = $target;
	}

	public function getTarget(): IToken
	{
		return $this->target;
	}
}