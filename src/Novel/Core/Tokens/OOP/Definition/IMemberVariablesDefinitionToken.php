<?php
namespace Novel\Core\Tokens\OOP\Definition;


use Novel\Core\IToken;
use Novel\Core\Tokens\IScopeToken;
use Novel\Core\Tokens\OOP\Variables\IMemberVariableToken;


interface IMemberVariablesDefinitionToken extends IScopeToken
{
	/**
	 * @param IMemberVariableToken[] ...$token
	 * @return IMemberVariablesDefinitionToken
	 */
	public function addVariableToken(IMemberVariableToken ...$token): IMemberVariablesDefinitionToken;
	
	
	/**
	 * @param $name
	 * @param IToken|null $value
	 * @return static|IMemberVariablesDefinitionToken
	 */
	public function addPrivateMember($name, ?IToken $value = null): IMemberVariablesDefinitionToken;
	
	/**
	 * @param $name
	 * @param IToken|null $value
	 * @return static|IMemberVariablesDefinitionToken
	 */
	public function addProtectedMember($name, ?IToken $value = null): IMemberVariablesDefinitionToken;
	
	/**
	 * @param $name
	 * @param IToken|null $value
	 * @return static|IMemberVariablesDefinitionToken
	 */
	public function addPublicMember($name, ?IToken $value = null): IMemberVariablesDefinitionToken;
	
	/**
	 * @param $name
	 * @param IToken|null $value
	 * @return static|IMemberVariablesDefinitionToken
	 */
	public function addPrivateStaticMember($name, ?IToken $value = null): IMemberVariablesDefinitionToken;
	
	/**
	 * @param $name
	 * @param IToken|null $value
	 * @return static|IMemberVariablesDefinitionToken
	 */
	public function addProtectedStaticMember($name, ?IToken $value = null): IMemberVariablesDefinitionToken;
	
	/**
	 * @param $name
	 * @param IToken|null $value
	 * @return static|IMemberVariablesDefinitionToken
	 */
	public function addPublicStaticMember($name, ?IToken $value = null): IMemberVariablesDefinitionToken;
}