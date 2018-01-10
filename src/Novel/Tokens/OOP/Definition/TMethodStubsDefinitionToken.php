<?php
namespace Novel\Tokens\OOP\Definition;


use Novel\AccessType;
use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INameToken;
use Novel\Core\Tokens\OOP\Definition\IMethodStubsDefinitionToken;
use Novel\Core\Tokens\OOP\Methods\IMethodStubToken;
use Novel\Tokens\OOP\Methods\MethodStubToken;


trait TMethodStubsDefinitionToken
{
	/**
	 * @param IMethodStubToken[] ...$token
	 * @return static|IMethodStubsDefinitionToken
	 */
	public function addMethodStubToken(IMethodStubToken ...$token): IMethodStubsDefinitionToken
	{
		foreach ($token as $item)
		{
			if (is_array($item))
			{
				$this->addMethodStubToken(...$item);
			}
			else
			{
				if (!($item instanceof IMethodStubToken))
					throw new \Exception("Token can be instance of IMethodStubToken or array only");
				
				$this->add($item);
			}
		}
		
		return $this;
	}
	
	
	/**
	 * @param string|IName|INameToken $name
	 * @return static|IMethodStubsDefinitionToken
	 */
	public function addPublicMethodStub($name): IMethodStubsDefinitionToken
	{
		$token = new MethodStubToken();
		$token->setName($name);
		$token->setAccessibility(AccessType::PUBLIC);
		$this->addMethodStubToken($token);
		
		return $this;
	}
	
	/**
	 * @param string|IName|INameToken $name
	 * @return static|IMethodStubsDefinitionToken
	 */
	public function addPublicStaticMethodStub($name): IMethodStubsDefinitionToken
	{
		$token = new MethodStubToken();
		$token->setName($name);
		$token->setAccessibility(AccessType::PUBLIC);
		$token->setIsStatic(true);
		$this->addMethodStubToken($token);
		
		return $this;
	}
}