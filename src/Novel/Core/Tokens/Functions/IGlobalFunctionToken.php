<?php
namespace Novel\Core\Tokens\Functions;


use Novel\Core\Tokens\INamedToken;
use Novel\Core\Tokens\Functions\Common\IWithUseToken;
use Novel\Core\Tokens\Functions\Common\IWithBodyToken;


interface IGlobalFunctionToken extends 
	IFunctionToken,
	IWithBodyToken,
	IWithUseToken,
	INamedToken
{
	
}