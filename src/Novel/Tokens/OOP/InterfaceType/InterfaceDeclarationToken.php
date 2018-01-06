<?php
namespace Novel\Tokens\OOP\InterfaceType;


use Novel\Core\Tokens\OOP\InterfaceType\IInterfaceDeclarationToken;
use Novel\Tokens\OOP\Declaration\TExtendsDeclarationToken;
use Novel\Tokens\Base\AbstractChildlessToken;
use Novel\Tokens\Named\TNamedToken;


class InterfaceDeclarationToken extends AbstractChildlessToken implements IInterfaceDeclarationToken
{
	use TNamedToken;
	use TExtendsDeclarationToken;
}