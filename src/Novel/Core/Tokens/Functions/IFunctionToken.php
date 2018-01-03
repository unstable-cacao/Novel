<?php
namespace Novel\Core\Tokens\Functions;


use Novel\Core\Tokens\INamedToken;
use Novel\Core\Tokens\Functions\Common\IWithParamListToken;
use Novel\Core\Tokens\Functions\Common\IWithReturnTypeToken;


interface IFunctionToken extends 
	INamedToken,
	IWithParamListToken,
	IWithReturnTypeToken
{
	
}