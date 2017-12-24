<?php
namespace Novel\Core\Tokens\Functions;


use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INameToken;
use Novel\Core\Tokens\INamedToken;
use Novel\Core\Tokens\Generic\IValueExpressionToken;


interface IParamDefinitionToken extends INamedToken
{
	public function isNullable(): bool;
	public function setIsNullable(bool $isNullable): void;
	
	public function isVariadic(): bool;
	public function setIsVariadic(bool $isVariadic): void;
	
	public function isByReference(): bool;
	public function setIsByReference(bool $isByReference): void;
	
	public function getNameObject(): IName;
	public function getName(): string;

	/**
	 * @param INameToken|IName|string $type
	 */
	public function setType($type): void;
	
	/**
	 * @param null|IValueExpressionToken|mixed $value
	 */
	public function setDefaultValue($value): void;
	public function getDefaultValue(): ?IValueExpressionToken;
}