<?php
namespace Novel\Core\Tokens\Reference;


use Novel\Core\Tokens\Generic\IValueExpressionToken;


interface IVariableVariableToken extends IVariableToken
{
	public function getSubject(): IValueExpressionToken;
	public function setSubject(IValueExpressionToken $subject);
}