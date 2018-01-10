<?php
namespace Novel\Tokens\OOP\Definition;


use Novel\AccessType;
use Novel\Core\IToken;
use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INameToken;
use Novel\Core\Tokens\OOP\Definition\IMemberVariablesDefinitionToken;
use Novel\Core\Tokens\OOP\Variables\IMemberVariableToken;
use Novel\Tokens\OOP\Variables\MemberVariableToken;


trait TMemberVariablesDefinitionToken
{
	/**
	 * @param IMemberVariableToken[] ...$token
	 * @return static|IMemberVariablesDefinitionToken
	 */
	public function addVariableToken(IMemberVariableToken ...$token): IMemberVariablesDefinitionToken
	{
		foreach ($token as $item) 
		{
			if (is_array($item))
			{
				$this->addVariableToken(...$item);
			}
			else 
			{
				if (!($item instanceof IMemberVariableToken))
					throw new \Exception("Token can be instance of IMemberVariableToken or array only");
				
				$this->add($item);
			}
		}
		
		return $this;
	}
	
	
	/**
	 * @param string|IName|INameToken $name
	 * @param IToken|null $value
	 * @return static|IMemberVariablesDefinitionToken
	 */
	public function addPrivateMember($name, ?IToken $value = null): IMemberVariablesDefinitionToken
	{
		$token = new MemberVariableToken($name, $value);
		$token->setAccessibility(AccessType::PRIVATE);
		$this->addVariableToken($token);
		
		return $this;
	}
	
	/**
	 * @param string|IName|INameToken $name
	 * @param IToken|null $value
	 * @return static|IMemberVariablesDefinitionToken
	 */
	public function addProtectedMember($name, ?IToken $value = null): IMemberVariablesDefinitionToken
	{
		$token = new MemberVariableToken($name, $value);
		$token->setAccessibility(AccessType::PROTECTED);
		$this->addVariableToken($token);
		
		return $this;
	}
	
	/**
	 * @param string|IName|INameToken $name
	 * @param IToken|null $value
	 * @return static|IMemberVariablesDefinitionToken
	 */
	public function addPublicMember($name, ?IToken $value = null): IMemberVariablesDefinitionToken
	{
		$token = new MemberVariableToken($name, $value);
		$token->setAccessibility(AccessType::PUBLIC);
		$this->addVariableToken($token);
		
		return $this;
	}
	
	/**
	 * @param string|IName|INameToken $name
	 * @param IToken|null $value
	 * @return static|IMemberVariablesDefinitionToken
	 */
	public function addPrivateStaticMember($name, ?IToken $value = null): IMemberVariablesDefinitionToken
	{
		$token = new MemberVariableToken($name, $value);
		$token->setAccessibility(AccessType::PRIVATE);
		$token->setIsStatic(true);
		$this->addVariableToken($token);
		
		return $this;
	}
	
	/**
	 * @param string|IName|INameToken $name
	 * @param IToken|null $value
	 * @return static|IMemberVariablesDefinitionToken
	 */
	public function addProtectedStaticMember($name, ?IToken $value = null): IMemberVariablesDefinitionToken
	{
		$token = new MemberVariableToken($name, $value);
		$token->setAccessibility(AccessType::PROTECTED);
		$token->setIsStatic(true);
		$this->addVariableToken($token);
		
		return $this;
	}
	
	/**
	 * @param string|IName|INameToken $name
	 * @param IToken|null $value
	 * @return static|IMemberVariablesDefinitionToken
	 */
	public function addPublicStaticMember($name, ?IToken $value = null): IMemberVariablesDefinitionToken
	{
		$token = new MemberVariableToken($name, $value);
		$token->setAccessibility(AccessType::PUBLIC);
		$token->setIsStatic(true);
		$this->addVariableToken($token);
		
		return $this;
	}
}