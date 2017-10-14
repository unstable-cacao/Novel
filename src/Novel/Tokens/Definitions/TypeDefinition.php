<?php
namespace Novel\Tokens\Definitions;


use Novel\Tokens\NamedToken;
use Novel\Tokens\Base\AbstractToken;


class TypeDefinition extends AbstractToken
{
	private $isNullable;
	
	/** @var NamedToken */
	private $type;
	
	
	/**
	 * @param string|NamedToken $type
	 * @param bool $isNullable
	 */
	public function __construct($type, bool $isNullable = false)
	{
		parent::__construct('TODO');
		
		$this->setType($type);
		$this->isNullable = $isNullable;
	}
	
	
	public function setIsNullable(bool $isNullable): void
	{
		$this->isNullable = $isNullable;
	}
	
	public function setType($type): void
	{
		if (is_string($type))
		{
			$this->setupChild(new NamedToken($type));
		}
		else
		{
			$this->setupChild($type);
		}
		
		$this->type = $type;
	}
	
	public function type(): NamedToken
	{
		return $this->type;
	}
	
	public function isNullable(): bool
	{
		return $this->isNullable;
	}
}