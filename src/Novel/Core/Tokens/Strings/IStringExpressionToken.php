<?php
namespace Novel\Core\Tokens\Strings;


use Novel\Core\Tokens\Generic\IValueExpressionToken;
use Novel\Core\Tokens\Generic\IVariableReferenceToken;


interface IStringExpressionToken extends IValueExpressionToken
{
	public function addText(string $plain): IStringExpressionToken;
	public function addVariableReference(IVariableReferenceToken $token): IStringExpressionToken;
	public function addInStringExpression(IInStringExpressionToken $expression): IStringExpressionToken;
	
	public function appendVariableReference(): IVariableReferenceToken;
	public function appendInStringExpression(): IInStringExpressionToken;
}