<?php
namespace Novel\Tokens\OOP\Methods;


use Novel\Core\Tokens\OOP\Methods\IMethodStubToken;
use Novel\Tokens\Functions\AbstractFunctionToken;
use Novel\Tokens\Functions\Common\TStaticable;
use Novel\Tokens\OOP\Accessibility\TWithAccessibilityToken;


class MethodStubToken extends AbstractFunctionToken implements IMethodStubToken
{
	use TWithAccessibilityToken;
	use TStaticable;
}