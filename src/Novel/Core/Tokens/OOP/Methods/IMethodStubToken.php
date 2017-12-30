<?php
namespace Novel\Core\Tokens\OOP\Methods;


use Novel\Core\Tokens\INamedToken;
use Novel\Core\Tokens\Functions\IFunctionToken;
use Novel\Core\Tokens\Functions\Common\IStaticableToken;
use Novel\Core\Tokens\Functions\Common\IAbstractableToken;
use Novel\Core\Tokens\OOP\Accessibility\IWithAccessibilityToken;


interface IMethodStubToken extends
	IFunctionToken,
	IWithAccessibilityToken,	
	IStaticableToken,
	IAbstractableToken,
	INamedToken
{
	
}