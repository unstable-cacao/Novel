<?php
namespace Novel\Tokens\OOP\ClassType;


use Novel\Core\Tokens\OOP\ClassType\IClassDeclarationToken;
use Novel\Tokens\Base\AbstractChildlessToken;
use Novel\Tokens\Functions\Common\TAbstractable;
use Novel\Tokens\Named\TNamedToken;
use Novel\Tokens\OOP\Declaration\TExtendsDeclarationToken;
use Novel\Tokens\OOP\Declaration\TImplementsDeclarationToken;


class ClassDeclarationToken extends AbstractChildlessToken implements IClassDeclarationToken
{
	use TNamedToken;
	use TExtendsDeclarationToken;
	use TImplementsDeclarationToken;
	use TAbstractable;
}