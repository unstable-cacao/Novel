<?php
namespace Novel\Core\Tokens\OOP\Consts;


use Novel\Core\Tokens\Consts\IConstDeclarationToken;
use Novel\Core\Tokens\OOP\Accessibility\IWithAccessibilityToken;


interface IClassConstDeclarationToken extends
	IConstDeclarationToken,
	IWithAccessibilityToken
{
	
}