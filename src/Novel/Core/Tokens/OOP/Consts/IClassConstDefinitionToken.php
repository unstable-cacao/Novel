<?php
namespace Novel\Core\Tokens\OOP\Consts;


use Novel\Core\Tokens\OOP\Definition\IConstsDefinitionToken;
use Novel\Core\Tokens\OOP\Accessibility\IWithAccessibilityToken;


interface IClassConstDefinitionToken extends
	IConstsDefinitionToken,
	IWithAccessibilityToken
{
	
}