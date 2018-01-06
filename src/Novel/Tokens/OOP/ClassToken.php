<?php
namespace Novel\Tokens\OOP;


use Novel\Core\Tokens\OOP\IClassToken;
use Novel\Core\Tokens\OOP\ClassType\IClassDefinitionToken;
use Novel\Core\Tokens\OOP\ClassType\IClassDeclarationToken;

use Novel\Tokens\OOP\ClassType\ClassDefinitionToken;
use Novel\Tokens\OOP\ClassType\ClassDeclarationToken;
use Novel\Tokens\Base\AbstractChildlessToken;
use Novel\Tokens\Named\TNamedToken;


class ClassToken extends AbstractChildlessToken implements IClassToken
{
	use TNamedToken;
	
	
	/** @var ClassDeclarationToken */
	private $declaration;
	
	/** @var ClassDefinitionToken */
	private $definition;
	
	
	public function __construct()
	{
		$this->definition = new ClassDefinitionToken();
		$this->declaration = new ClassDeclarationToken();
	}


	public function getDeclarationToken(): IClassDeclarationToken
	{
		return $this->declaration;
	}

	public function getDefinitionToken(): IClassDefinitionToken
	{
		return $this->definition;
	}
}