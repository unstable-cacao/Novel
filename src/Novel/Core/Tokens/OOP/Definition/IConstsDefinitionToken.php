<?php
namespace Novel\Core\Tokens\OOP\Definition;


use Novel\AccessType;
use Novel\Core\Tokens\INamedToken;
use Novel\Core\Tokens\IScopeToken;
use Novel\Core\Tokens\OOP\Consts\IClassConstDeclarationToken;
use Novel\Core\Tokens\Consts\IConstValueToken;


interface IConstsDefinitionToken extends IScopeToken
{
	public function addConst(IClassConstDeclarationToken $token): void;
	public function createConst(): IClassConstDeclarationToken;
	
	/**
	 * @param INamedToken|string $name
	 * @param IConstValueToken|string|int|double|bool|null $value
	 * @param string $access
	 */
	public function addConstValue($name, $value, string $access = AccessType::PUBLIC): void;
}