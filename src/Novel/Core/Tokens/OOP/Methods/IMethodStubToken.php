<?php
namespace Novel\Core\Tokens\OOP\Methods;


use Novel\Core\Tokens\INamedToken;
use Novel\Core\Tokens\Functions\IFunctionToken;
use Novel\Core\Tokens\Functions\Common\IStaticable;
use Novel\Core\Tokens\OOP\Accessibility\IWithAccessibilityToken;


interface IMethodStubToken extends
	IFunctionToken,
	IWithAccessibilityToken,	
	IStaticable,
	INamedToken
{
	
}