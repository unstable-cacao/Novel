<?php
namespace Novel\Tokens\Functions;


use Novel\Core\IToken;
use Novel\Core\Tokens\Functions\IParamDefinitionToken;
use Novel\Core\Tokens\Generic\IValueExpression;
use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INameToken;
use Novel\Tokens\Base\AbstractToken;


class ParamDefinitionToken extends AbstractToken implements IParamDefinitionToken
{
	
	
	
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
	
	public function isNullable(): bool
	{
		// TODO: Implement isNullable() method.
	}
	
	public function setIsNullable(bool $isNullable): void
	{
		// TODO: Implement setIsNullable() method.
	}
	
	public function isVariadic(): bool
	{
		// TODO: Implement isVariadic() method.
	}
	
	public function setIsVariadic(bool $isVariadic): void
	{
		// TODO: Implement setIsVariadic() method.
	}
	
	public function isByReference(): bool
	{
		// TODO: Implement isByReference() method.
	}
	
	public function setIsByReference(bool $isByReference): void
	{
		// TODO: Implement setIsByReference() method.
	}
	
	public function getNameObject(): IName
	{
		// TODO: Implement getNameObject() method.
	}
	
	public function getName(): string
	{
		// TODO: Implement getName() method.
	}
	
	/**
	 * @param INameToken|IName|string $type
	 */
	public function setType($type): void
	{
		// TODO: Implement setType() method.
	}
	
	/**
	 * @param null|IValueExpression|mixed $value
	 */
	public function setDefaultValue($value): void
	{
		// TODO: Implement setDefaultValue() method.
	}
	
	public function getDefaultValue(): ?IValueExpression
	{
		// TODO: Implement getDefaultValue() method.
	}
	
	public function count(): int
	{
		// TODO: Implement count() method.
	}
	
	public function hasChildren(): bool
	{
		// TODO: Implement hasChildren() method.
	}
	
	/**
	 * @return IToken[]
	 */
	public function children(): array
	{
		// TODO: Implement children() method.
	}
}