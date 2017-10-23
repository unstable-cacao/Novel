<?php
namespace Novel\Tokens;


use Novel\Core\IToken;
use Novel\Core\Tokens\Functions\IFunctionToken;
use Novel\Core\Tokens\Functions\IParamDefinitionToken;
use Novel\Core\Tokens\Functions\IParamListDefinition;
use Novel\Core\Tokens\Generic\IValueExpression;
use Novel\Core\Tokens\ICodeScopeToken;
use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INameToken;
use Novel\Tokens\Base\AbstractTreeToken;


class FunctionToken extends AbstractTreeToken implements IFunctionToken
{
	public function __construct($name)
	{
		parent::__construct('');
		
		if (is_string($name))
		{
			$name = new NamedToken($name);
		}
		else if (!($name instanceof NamedToken))
		{
			throw new \Exception("Name must be an instance of NamedToken or string");
		}
		
		$name->setParent($this);
		$parameterList = new ParameterListDefinitionToken();
		$parameterList->setParent($this);
		$codeScope = new CodeScopeToken();
		$codeScope->setParent($this);
		
		$this->setChildrenArray([
			$name, 
			$parameterList, 
			$codeScope
		]);
	}
	
	
	public function getName(): string 
	{
		return $this->children()[0];
	}
	
	public function getParameterListDefinition(): ParameterListDefinitionToken
	{
		return $this->children()[1];
	}
	
	public function getCodeScope(): CodeScopeToken
	{
		return $this->children()[2];
	}
	
	public function setParameterList(IParamListDefinition $list): void
	{
		// TODO: Implement setParameterList() method.
	}
	
	public function getParameterList(): IParamListDefinition
	{
		// TODO: Implement getParameterList() method.
	}
	
	/**
	 * @param array|IParamDefinitionToken|string $item
	 * @return IParamListDefinition
	 */
	public function add($item): IParamListDefinition
	{
		// TODO: Implement add() method.
	}
	
	/**
	 * @param string|INameToken|IName null $type
	 * @param string|INameToken|IName $name
	 * @param IValueExpression|null|mixed $defaultValue
	 * @return IParamListDefinition
	 */
	public function addParameter($type, $name, $defaultValue): IParamListDefinition
	{
		// TODO: Implement addParameter() method.
	}
	
	/**
	 * @param string|INameToken|IName $type
	 */
	public function setReturnType($type): void
	{
		// TODO: Implement setReturnType() method.
	}
	
	public function getReturnType(): string
	{
		// TODO: Implement getReturnType() method.
	}
	
	public function getReturnTypeName(): IName
	{
		// TODO: Implement getReturnTypeName() method.
	}
	
	public function getReturnTypeToken(): INameToken
	{
		// TODO: Implement getReturnTypeToken() method.
	}
	
	public function setBody(ICodeScopeToken $body): void
	{
		// TODO: Implement setBody() method.
	}
	
	public function getBody(): ICodeScopeToken
	{
		// TODO: Implement getBody() method.
	}
	
	/**
	 * @param IToken|IToken[] $item
	 */
	public function addToBody($item): void
	{
		// TODO: Implement addToBody() method.
	}
	
	/**
	 * @param string|IName|INameToken $name
	 */
	public function setName($name): void
	{
		// TODO: Implement setName() method.
	}
	
	public function getNameToken(): INameToken
	{
		// TODO: Implement getNameToken() method.
	}
	
	public function getNameObject(): IName
	{
		// TODO: Implement getNameObject() method.
	}
}