<?php
namespace Novel\Tokens;


use Novel\Tokens\Base\AbstractToken;
use Novel\Tokens\Base\IExpressionToken;


class CodeScopeToken extends AbstractToken
{
	public function __construct()
	{
		parent::__construct('');
	}
	
	
	/**
	 * @param IExpressionToken|IExpressionToken[] $expression
	 */
	public function addExpressionStatement($expression)
	{
		
	}
}