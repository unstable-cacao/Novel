<?php
namespace Novel\Tokens\OOP\Definition;


use Novel\AccessType;
use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INameToken;
use Novel\Core\Tokens\OOP\Definition\IMethodsDefinitionToken;
use Novel\Core\Tokens\OOP\Methods\IMethodToken;
use Novel\Tokens\OOP\Methods\MethodToken;


trait TMethodsDefinitionToken
{
	/**
	 * @param IMethodToken[] ...$token
	 * @return IMethodsDefinitionToken
	 */
	public function addMethodToken(IMethodToken ...$token): IMethodsDefinitionToken
	{
		foreach ($token as $item)
		{
			if (is_array($item))
			{
				foreach ($item as $singleToken)
				{
					$this->addMethodToken($singleToken);
				}
			}
			else
			{
				if (!($token instanceof IMethodToken))
					throw new \Exception("Token can be instance of IMethodToken or array only");
				
				$token->setParent($this);
				$this->children()[] = $token;
			}
		}
		
		return $this;
	}
	
	
	/**
	 * @param string|IName|INameToken $name
	 * @return static|IMethodsDefinitionToken
	 */
	public function addPrivateMethod($name): IMethodsDefinitionToken
	{
		$token = new MethodToken();
		$token->setName($name);
		$token->setAccessibility(AccessType::PRIVATE);
		$this->addMethodToken($token);
		
		return $this;
	}
	
	/**
	 * @param string|IName|INameToken $name
	 * @return static|IMethodsDefinitionToken
	 */
	public function addProtectedMethod($name): IMethodsDefinitionToken
	{
		$token = new MethodToken();
		$token->setName($name);
		$token->setAccessibility(AccessType::PROTECTED);
		$this->addMethodToken($token);
		
		return $this;
	}
	
	/**
	 * @param string|IName|INameToken $name
	 * @return static|IMethodsDefinitionToken
	 */
	public function addPublicMethod($name): IMethodsDefinitionToken
	{
		$token = new MethodToken();
		$token->setName($name);
		$token->setAccessibility(AccessType::PUBLIC);
		$this->addMethodToken($token);
		
		return $this;
	}
	
	/**
	 * @param string|IName|INameToken $name
	 * @return static|IMethodsDefinitionToken
	 */
	public function addPrivateStaticMethod($name): IMethodsDefinitionToken
	{
		$token = new MethodToken();
		$token->setName($name);
		$token->setAccessibility(AccessType::PRIVATE);
		$token->setIsStatic(true);
		$this->addMethodToken($token);
		
		return $this;
	}
	
	/**
	 * @param string|IName|INameToken $name
	 * @return static|IMethodsDefinitionToken
	 */
	public function addProtectedStaticMethod($name): IMethodsDefinitionToken
	{
		$token = new MethodToken();
		$token->setName($name);
		$token->setAccessibility(AccessType::PROTECTED);
		$token->setIsStatic(true);
		$this->addMethodToken($token);
		
		return $this;
	}
	
	/**
	 * @param string|IName|INameToken $name
	 * @return static|IMethodsDefinitionToken
	 */
	public function addPublicStaticMethod($name): IMethodsDefinitionToken
	{
		$token = new MethodToken();
		$token->setName($name);
		$token->setAccessibility(AccessType::PUBLIC);
		$token->setIsStatic(true);
		$this->addMethodToken($token);
		
		return $this;
	}
}