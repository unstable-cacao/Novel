<?php
namespace Novel\Tokens\OOP\Methods;


use Novel\AccessType;
use Novel\Core\Tokens\OOP\Methods\IMethodStubToken;
use Novel\Tokens\Functions\AbstractFunctionToken;
use Novel\Tokens\Functions\Common\TStaticable;
use Novel\Tokens\OOP\Accessibility\AccessibilityToken;
use Novel\Tokens\OOP\Accessibility\TWithAccessibilityToken;


class MethodStubToken extends AbstractFunctionToken implements IMethodStubToken
{
	use TWithAccessibilityToken;
	use TStaticable;
	
	
	public function __construct(?string $name = null)
	{
		parent::__construct($name);
		
		$this->accessibilityToken = new AccessibilityToken(AccessType::PUBLIC);
	}
}