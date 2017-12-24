<?php
namespace Novel\Core\Tokens\ScopeReference;


use Novel\Core\IToken;
use Novel\Core\Tokens\Generic\IValueExpressionToken;
use Novel\Core\Tokens\Generic\ICallableReferenceToken;


interface IScopeReferenceToken
	extends 
		IToken,
		IValueExpressionToken,
		ICallableReferenceToken
{
	public function set(IToken $leftSide, IToken $rightSide): void;
	public function setLeftSide(IToken $leftSide): void;
	public function setRightSide(IToken $rightSide): void;
	
	public function getLeftSide(): IToken;
	public function getRightSide(): IToken;
}