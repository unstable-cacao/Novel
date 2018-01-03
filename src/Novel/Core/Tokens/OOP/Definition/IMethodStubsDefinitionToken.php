<?php
namespace Novel\Core\Tokens\OOP\Definition;


use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INameToken;
use Novel\Core\Tokens\IScopeToken;
use Novel\Core\Tokens\OOP\Methods\IMethodStubToken;


interface IMethodStubsDefinitionToken extends IScopeToken
{
	/**
	 * @param IMethodStubToken[] ...$token
	 * @return IMethodStubsDefinitionToken
	 */
	public function addMethodStubToken(IMethodStubToken ...$token): IMethodStubsDefinitionToken;
	
	
	/**
	 * @param string|IName|INameToken $name
	 * @return static|IMethodStubsDefinitionToken
	 */
	public function addPublicMethodStub($name): IMethodStubsDefinitionToken;
	
	/**
	 * @param string|IName|INameToken $name
	 * @return static|IMethodStubsDefinitionToken
	 */
	public function addPublicStaticMethodStub($name): IMethodStubsDefinitionToken;
}