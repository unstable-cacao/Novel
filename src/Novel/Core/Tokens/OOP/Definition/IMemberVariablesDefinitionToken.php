<?php
namespace Novel\Core\Tokens\OOP\Definition;


use Novel\Core\IToken;
use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INameToken;
use Novel\Core\Tokens\OOP\Variables\IMemberVariableToken;
use Novel\Core\Tokens\Scope\IOODefinitionScopeToken;


interface IMemberVariablesDefinitionToken extends IOODefinitionScopeToken
{
	/**
	 * @param IMemberVariableToken[] ...$token
	 * @return IMemberVariablesDefinitionToken
	 */
	public function addVariableToken(IMemberVariableToken ...$token): IMemberVariablesDefinitionToken;
	
	
	/**
	 * @param string|IName|INameToken $name
	 * @param IToken|null $value
	 * @return static|IMemberVariablesDefinitionToken
	 */
	public function addPrivateMember($name, ?IToken $value = null): IMemberVariablesDefinitionToken;
	
	/**
	 * @param string|IName|INameToken $name
	 * @param IToken|null $value
	 * @return static|IMemberVariablesDefinitionToken
	 */
	public function addProtectedMember($name, ?IToken $value = null): IMemberVariablesDefinitionToken;
	
	/**
	 * @param string|IName|INameToken $name
	 * @param IToken|null $value
	 * @return static|IMemberVariablesDefinitionToken
	 */
	public function addPublicMember($name, ?IToken $value = null): IMemberVariablesDefinitionToken;
	
	/**
	 * @param string|IName|INameToken $name
	 * @param IToken|null $value
	 * @return static|IMemberVariablesDefinitionToken
	 */
	public function addPrivateStaticMember($name, ?IToken $value = null): IMemberVariablesDefinitionToken;
	
	/**
	 * @param string|IName|INameToken $name
	 * @param IToken|null $value
	 * @return static|IMemberVariablesDefinitionToken
	 */
	public function addProtectedStaticMember($name, ?IToken $value = null): IMemberVariablesDefinitionToken;
	
	/**
	 * @param string|IName|INameToken $name
	 * @param IToken|null $value
	 * @return static|IMemberVariablesDefinitionToken
	 */
	public function addPublicStaticMember($name, ?IToken $value = null): IMemberVariablesDefinitionToken;
}