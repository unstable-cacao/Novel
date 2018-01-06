<?php
namespace Novel\Tokens\OOP;


use Novel\Core\Tokens\OOP\ITraitToken;
use Novel\Core\Tokens\OOP\TraitType\ITraitDefinitionToken;
use Novel\Core\Tokens\OOP\TraitType\ITraitDeclarationToken;

use Novel\Tokens\OOP\TraitType\TraitDefinitionToken;
use Novel\Tokens\OOP\TraitType\TraitDeclarationToken;
use Novel\Tokens\Base\AbstractChildlessToken;
use Novel\Tokens\Named\TNamedToken;


class TraitToken extends AbstractChildlessToken implements ITraitToken
{
	use TNamedToken;
	
	
	/** @var TraitDeclarationToken */
	private $declaration;
	
	/** @var TraitDefinitionToken */
	private $definition;
	
	
	public function __construct()
	{
		$this->definition = new TraitDefinitionToken();
		$this->declaration = new TraitDeclarationToken();
	}


	public function getDeclarationToken(): ITraitDeclarationToken
	{
		return $this->declaration;
	}

	public function getDefinitionToken(): ITraitDefinitionToken
	{
		return $this->definition;
	}
}