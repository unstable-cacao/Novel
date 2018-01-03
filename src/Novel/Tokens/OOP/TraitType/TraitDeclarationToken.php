<?php
namespace Novel\Tokens\OOP\TraitType;


use Novel\Core\Tokens\OOP\TraitType\ITraitDeclarationToken;
use Novel\Tokens\Base\AbstractChildlessToken;
use Novel\Tokens\Named\TNamedToken;


class TraitDeclarationToken extends AbstractChildlessToken implements ITraitDeclarationToken
{
	use TNamedToken;
}