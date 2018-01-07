<?php
namespace Novel\Tokens\Functions\Params;


use Novel\Core\Tokens\Functions\Params\IParamDefinitionToken;
use Novel\Core\Tokens\Functions\Params\IParamListDefinition;
use Novel\Core\Tokens\Generic\IValueExpressionToken;
use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INameToken;
use Novel\Tokens\Base\AbstractChildlessToken;
use Novel\Tokens\Consts\ConstValueToken;
use Novel\Tokens\Named\NameToken;
use Novel\Tokens\Named\TNamedToken;


class ParamDefinitionToken extends AbstractChildlessToken implements IParamDefinitionToken
{
	use TNamedToken;
	
	
	/** @var INameToken|null */
	private $type;
	
	/** @var IValueExpressionToken|null */
	private $defaultVal;
	
	/** @var bool */
	private $isNullable;
	
	/** @var bool */
	private $isVariadic;
	
	/** @var bool */
	private $isByReference;
	
	
	/**
	 * @param string|IName|INameToken $name
	 * @param INameToken|IName|string|null $type
	 * @param IValueExpressionToken|string|int|double|bool|null $default
	 * @param bool $isNullable
	 * @param bool $isVariadic
	 * @param bool $isByReference
	 */
	public function __construct(
		$name, 
		$type = null, 
		$default = IParamListDefinition::NO_DEFAULT_VALUE, 
		bool $isNullable = true,
		bool $isVariadic = false, 
		bool $isByReference = false
	)
	{
		$this->setName($name);
		
		if ($type)
			$this->setType($type);
		
		if ($default !== IParamListDefinition::NO_DEFAULT_VALUE)
			$this->setDefaultValue($default);
		
		$this->isNullable = $isNullable;
		$this->isVariadic = $isVariadic;
		$this->isByReference = $isByReference;
	}
	
	public function isNullable(): bool
	{
		return $this->isNullable;
	}
	
	public function setIsNullable(bool $isNullable): void
	{
		$this->isNullable = $isNullable;
	}
	
	public function isVariadic(): bool
	{
		return $this->isVariadic;
	}
	
	public function setIsVariadic(bool $isVariadic): void
	{
		$this->isVariadic = $isVariadic;
	}
	
	public function isByReference(): bool
	{
		return $this->isByReference;
	}
	
	public function setIsByReference(bool $isByReference): void
	{
		$this->isByReferenc = $isByReference;
	}
	
	/**
	 * @param INameToken|IName|string $type
	 */
	public function setType($type): void
	{
		if (!($type instanceof INameToken))
		{
			$type = new NameToken($type);
		}
		
		$this->type = $type;
	}
	
	public function getTypeToken(): ?INameToken
	{
		return $this->type;
	}
	
	public function getTypeName(): ?IName
	{
		return $this->type ? $this->type->getNameObject() : null;
	}
	
	public function getType(): ?string
	{
		return $this->type ? $this->type->getName() : null;
	}
	
	public function removeType(): void
	{
		$this->type = null;
	}
	
	/**
	 * @param IValueExpressionToken|string|int|double|bool|null $value
	 */
	public function setDefaultValue($value): void
	{
		if (!($value instanceof IValueExpressionToken))
		{
			$value = new ConstValueToken($value);
		}
		
		$this->defaultVal = $value;
	}
	
	public function getDefaultValue(): ?IValueExpressionToken
	{
		return $this->defaultVal;
	}
	
	public function removeDefaultValue(): void
	{
		$this->defaultVal = null;
	}
}