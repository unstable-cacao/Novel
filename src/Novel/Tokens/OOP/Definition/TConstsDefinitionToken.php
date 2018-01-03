<?php
namespace Novel\Tokens\OOP\Definition;


use Novel\AccessType;
use Novel\Core\Tokens\Consts\IConstValueToken;
use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INameToken;
use Novel\Core\Tokens\OOP\Consts\IClassConstDeclarationToken;
use Novel\Tokens\OOP\Consts\ClassConstDeclarationToken;


trait TConstsDefinitionToken
{
	public function addConst(IClassConstDeclarationToken $token): void
	{
		$this->add($token);
	}
	
	public function createConst(): IClassConstDeclarationToken
	{
		$token = new ClassConstDeclarationToken();
		$this->addConst($token);
		
		return $token;
	}
	
	/**
	 * @param string|IName|INameToken $name
	 * @param IConstValueToken|string|int|double|bool|null $value
	 * @param string $access
	 */
	public function addConstValue($name, $value, string $access = AccessType::PUBLIC): void
	{
		$token = $this->createConst();
		$token->setName($name);
		$token->setValue($value);
		$token->setAccessibility($access);
	}
}