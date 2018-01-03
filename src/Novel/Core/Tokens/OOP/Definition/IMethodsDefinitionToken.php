<?php
namespace Novel\Core\Tokens\OOP\Definition;


use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INameToken;
use Novel\Core\Tokens\OOP\Methods\IMethodToken;


interface IMethodsDefinitionToken extends IMethodStubsDefinitionToken
{
	/**
	 * @param IMethodToken[] ...$token
	 * @return IMethodsDefinitionToken
	 */
	public function addMethodToken(IMethodToken ...$token): IMethodsDefinitionToken;
	
	
	/**
	 * @param string|IName|INameToken $name
	 * @return static|IMethodsDefinitionToken
	 */
	public function addPrivateMethod($name): IMethodsDefinitionToken;
	
	/**
	 * @param string|IName|INameToken $name
	 * @return static|IMethodsDefinitionToken
	 */
	public function addProtectedMethod($name): IMethodsDefinitionToken;
	
	/**
	 * @param string|IName|INameToken $name
	 * @return static|IMethodsDefinitionToken
	 */
	public function addPublicMethod($name): IMethodsDefinitionToken;
	
	/**
	 * @param string|IName|INameToken $name
	 * @return static|IMethodsDefinitionToken
	 */
	public function addPrivateStaticMethod($name): IMethodsDefinitionToken;
	
	/**
	 * @param string|IName|INameToken $name
	 * @return static|IMethodsDefinitionToken
	 */
	public function addProtectedStaticMethod($name): IMethodsDefinitionToken;
	
	/**
	 * @param string|IName|INameToken $name
	 * @return static|IMethodsDefinitionToken
	 */
	public function addPublicStaticMethod($name): IMethodsDefinitionToken;
}