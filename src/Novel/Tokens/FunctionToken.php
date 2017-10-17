<?php
namespace Novel\Tokens;


use Novel\Tokens\Base\AbstractTreeToken;


class FunctionToken extends AbstractTreeToken
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
	
	
	public function getName(): NamedToken
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
}