<?php
namespace Novel\Tokens\OOP\InterfaceType;


use Novel\Core\Tokens\OOP\InterfaceType\IInterfaceDeclarationToken;
use Novel\Tokens\Base\AbstractChildlessToken;
use Novel\Tokens\Named\TNamedToken;
use Novel\Tokens\OOP\Declaration\TExtendsDeclarationToken;


class InterfaceDeclarationToken extends AbstractChildlessToken implements IInterfaceDeclarationToken
{
	use TNamedToken;
	use TExtendsDeclarationToken;
}