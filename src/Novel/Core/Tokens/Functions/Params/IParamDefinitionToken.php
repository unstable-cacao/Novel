<?php
namespace Novel\Core\Tokens\Functions\Params;


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

	/**
	 * @param INameToken|IName|string $type
	 */
	public function setType($type): void;
	public function getTypeToken(): ?INameToken;
	public function getTypeName(): ?IName;
	public function getType(): ?string;
	public function removeType(): void;
	
	/**
	 * @param IValueExpressionToken|string|int|double|bool|null $value
	 */
	public function setDefaultValue($value): void;
	
	public function getDefaultValue(): ?IValueExpressionToken;
	public function removeDefaultValue(): void;
}