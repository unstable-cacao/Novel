<?php
namespace Novel\Tokens\OOP\Methods;


use Novel\Tokens\Functions\Common\TWithBody;
use Novel\Core\Tokens\OOP\Methods\IMethodToken;
use Novel\Tokens\Functions\Common\TAbstractable;


class MethodToken extends MethodStubToken implements IMethodToken
{
	use TWithBody;
	use TAbstractable;
}