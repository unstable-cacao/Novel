<?php
namespace Novel\Core\Tokens\Operators;


use Novel\Core\IToken;


interface ISingleOperatorToken extends IToken
{
	public function getOperator(): ?string;
	public function getOperatorToken(): ?IOperatorToken;

	/**
	 * @param string|IOperatorToken $operator
	 */
	public function setOperator($operator): void;
}