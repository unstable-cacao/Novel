<?php
namespace Novel\Core\Tokens\OOP\Definition;


use Novel\AccessType;
use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INameToken;
use Novel\Core\Tokens\OOP\Consts\IClassConstDeclarationToken;
use Novel\Core\Tokens\Scope\IOODefinitionScopeToken;
use Novel\Core\Tokens\Consts\IConstValueToken;


interface IConstsDefinitionToken extends IOODefinitionScopeToken 
{
	public function addConst(IClassConstDeclarationToken $token): void;
	public function createConst(): IClassConstDeclarationToken;

	/**
	 * @param string|IName|INameToken $name
	 * @param IConstValueToken|string|int|double|bool|null $value
	 * @param string $access
	 * @return IClassConstDeclarationToken
	 */
	public function addConstValue($name, $value, string $access = AccessType::PUBLIC): IClassConstDeclarationToken;
}