<?php
namespace Novel\Tokens\OOP\Methods;


use Novel\Tokens\Functions\Common\TWithBody;
use Novel\Core\Tokens\OOP\Methods\IMethodToken;
use Novel\Tokens\Functions\Common\TAbstractable;
use Novel\Tokens\Scope\CodeScopeToken;


class MethodToken extends MethodStubToken implements IMethodToken
{
	use TWithBody;
	use TAbstractable;
	
	
	public function __construct(?string $name = null)
	{
		parent::__construct($name);
		
		$this->body = new CodeScopeToken();
	}
}