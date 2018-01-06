<?php
namespace Novel\Tokens\OOP;


use Novel\Core\Tokens\OOP\IInterfaceToken;
use Novel\Core\Tokens\OOP\InterfaceType\IInterfaceDefinitionToken;
use Novel\Core\Tokens\OOP\InterfaceType\IInterfaceDeclarationToken;

use Novel\Tokens\OOP\InterfaceType\InterfaceDefinitionToken;
use Novel\Tokens\OOP\InterfaceType\InterfaceDeclarationToken;
use Novel\Tokens\Base\AbstractChildlessToken;
use Novel\Tokens\Named\TNamedToken;


class InterfaceToken extends AbstractChildlessToken implements IInterfaceToken
{
	use TNamedToken;
	
	
	/** @var InterfaceDeclarationToken */
	private $declaration;
	
	/** @var InterfaceDefinitionToken */
	private $definition;
	
	
	public function __construct()
	{
		$this->definition = new InterfaceDefinitionToken();
		$this->declaration = new InterfaceDeclarationToken();
	}


	public function getDeclarationToken(): IInterfaceDeclarationToken
	{
		return $this->declaration;
	}

	public function getDefinitionToken(): IInterfaceDefinitionToken
	{
		return $this->definition;
	}
}