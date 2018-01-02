<?php
namespace Novel\Core\Tokens\OOP\Methods;


use Novel\Core\Tokens\Functions\Common\IAbstractable;
use Novel\Core\Tokens\Functions\Common\IWithBody;


interface IMethodToken extends
	IMethodStubToken,
	IWithBody,
	IAbstractable
{
	
}