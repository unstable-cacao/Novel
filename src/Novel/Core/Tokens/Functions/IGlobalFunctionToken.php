<?php
namespace Novel\Core\Tokens\Functions;


use Novel\Core\Tokens\INamedToken;
use Novel\Core\Tokens\Functions\Common\IWithUse;
use Novel\Core\Tokens\Functions\Common\IWithBody;


interface IGlobalFunctionToken extends 
	IFunctionToken,
	IWithBody,
	IWithUse,
	INamedToken
{
	
}