<?php
namespace Novel\Tokens\Functions;


use Novel\Core\Tokens\Functions\IGlobalFunctionToken;
use Novel\Tokens\Functions\Common\TWithUse;
use Novel\Tokens\Functions\Common\TWithBody;
use Novel\Tokens\Functions\UseScope\UseScopeToken;
use Novel\Tokens\Scope\CodeScopeToken;


class GlobalFunctionToken extends AbstractFunctionToken implements IGlobalFunctionToken
{
	use TWithBody;
	use TWithUse;
	
	
	public function __construct(?string $name = null)
	{
		parent::__construct($name);
		
		$this->useToken = new UseScopeToken();
		$this->body = new CodeScopeToken();
	}
}