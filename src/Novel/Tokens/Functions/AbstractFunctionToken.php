<?php
namespace Novel\Tokens\Functions;


use Novel\Core\IToken;
use Novel\Core\Tokens\Functions\IFunctionToken;
use Novel\Core\Tokens\Functions\IParamDefinitionToken;
use Novel\Core\Tokens\Functions\IParamListDefinition;
use Novel\Core\Tokens\Generic\IValueExpressionToken;
use Novel\Core\Tokens\ICodeScopeToken;
use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INameToken;
use Novel\Tokens\Base\AbstractToken;
use Novel\Tokens\NameToken;


abstract class AbstractFunctionToken extends AbstractToken implements IFunctionToken
{
	/** @var IParamListDefinition */
	private $parameterList;
	
	/** @var INameToken */
	private $returnType;
	
	/** @var ICodeScopeToken */
	private $body;
	
	/** @var INameToken */
	private $name;
	
	
	public function setParameterList(IParamListDefinition $list): void
	{
		$list->setParent($this);
		$this->parameterList = $list;
	}
	
	public function getParameterList(): IParamListDefinition
	{
		return $this->parameterList;
	}
	
	/**
	 * @param array|IParamDefinitionToken|string $item
	 * @return IParamListDefinition
	 */
	public function add($item): IParamListDefinition
	{
		$this->parameterList->add($item);
		return $this->parameterList;
	}
	
	/**
	 * @param string|INameToken|IName null $type
	 * @param string|INameToken|IName $name
	 * @param IValueExpressionToken|null|mixed $defaultValue
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
		if (is_string($type) || $type instanceof IName)
		{
			$type = new NameToken($type);
		}
		else if (!($type instanceof INameToken))
		{
			throw new \Exception("Type must be string, instance of IName or INameToken");
		}
		
		$type->setParent($this);
		$this->returnType = $type;
	}
	
	public function getReturnType(): string
	{
		return $this->returnType->getName();
	}
	
	public function getReturnTypeName(): IName
	{
		return $this->returnType->getNameObject();
	}
	
	public function getReturnTypeToken(): INameToken
	{
		return $this->returnType;
	}
	
	public function setBody(ICodeScopeToken $body): void
	{
		$this->body = $body;
	}
	
	public function getBody(): ICodeScopeToken
	{
		return $this->body;
	}
	
	/**
	 * @param IToken|IToken[] $item
	 */
	public function addToBody($item): void
	{
		$this->body->add($item);
	}
	
	/**
	 * @param string|IName|INameToken $name
	 */
	public function setName($name): void
	{
		if (is_string($name) || $name instanceof IName)
		{
			$name = new NameToken($name);
		}
		else if (!($name instanceof INameToken))
		{
			throw new \Exception("Name must be string, instance of IName or INameToken");
		}
		
		$name->setParent($this);
		$this->name = $name;
	}
	
	public function getName(): string
	{
		return $this->name->getName();
	}
	
	public function getNameToken(): INameToken
	{
		return $this->name;
	}
	
	public function getNameObject(): IName
	{
		return $this->name->getNameObject();
	}
	
	public function count(): int
	{
		return 4;
	}
	
	public function hasChildren(): bool
	{
		return true;
	}
	
	/**
	 * @return IToken[]
	 */
	public function children(): array
	{
		return [
			$this->name,
			$this->parameterList,
			$this->returnType,
			$this->body
		];
	}
}