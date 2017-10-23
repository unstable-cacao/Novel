<?php
namespace Novel\Tokens;


use Novel\Core\IToken;
use Novel\Core\Tokens\Functions\IAccessibilityToken;
use Novel\Core\Tokens\Functions\IMethodToken;
use Novel\Core\Tokens\Functions\IParamDefinitionToken;
use Novel\Core\Tokens\Functions\IParamListDefinition;
use Novel\Core\Tokens\Generic\IValueExpression;
use Novel\Core\Tokens\ICodeScopeToken;
use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INameToken;
use Novel\Tokens\Base\AbstractTreeToken;


class MethodToken extends AbstractTreeToken implements IMethodToken
{
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
	 * @param string|IAccessibilityToken $level
	 */
	public function setAccessibility($level): void
	{
		// TODO: Implement setAccessibility() method.
	}
	
	public function getAccessibility(): string
	{
		// TODO: Implement getAccessibility() method.
	}
	
	public function getAccessibilityToken(): IAccessibilityToken
	{
		// TODO: Implement getAccessibilityToken() method.
	}
	
	public function setPublic()
	{
		// TODO: Implement setPublic() method.
	}
	
	public function setProtected()
	{
		// TODO: Implement setProtected() method.
	}
	
	public function setPrivate()
	{
		// TODO: Implement setPrivate() method.
	}
	
	public function isAbstract(): bool
	{
		// TODO: Implement isAbstract() method.
	}
	
	public function setIsAbstract(bool $isAbstract): void
	{
		// TODO: Implement setIsAbstract() method.
	}
	
	public function isStatic(): bool
	{
		// TODO: Implement isStatic() method.
	}
	
	public function setIsStatic(bool $isStatic): void
	{
		// TODO: Implement setIsStatic() method.
	}
	
	/**
	 * @param string|IName|INameToken $name
	 */
	public function setName($name): void
	{
		// TODO: Implement setName() method.
	}
	
	public function getName(): string
	{
		// TODO: Implement getName() method.
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