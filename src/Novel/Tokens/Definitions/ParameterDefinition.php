<?php
namespace Novel\Tokens\Definitions;


use Novel\Tokens\NamedToken;
use Novel\Tokens\ConstValueToken;
use Novel\Tokens\Base\AbstractToken;


class ParameterDefinition extends AbstractToken
{
	/** @var TypeDefinition|null */
	private $type;
	
	/** @var string */
	private $name;
	
	/** @var ConstValueToken */
	private $default;
	
	
	/**
	 * ParameterDefinition constructor.
	 * @param string|NamedToken|TypeDefinition|null $type
	 * @param string $name
	 * @param ConstValueToken|mixed|null $def
	 */
	public function __construct($type, $name, $def)
	{
		parent::__construct('TODO');
		
		$this->setType($type);
		$this->setName($name);
		$this->setDefaultValue($def);
	}
	
	
	public function setType($type, bool $isNullable = false): void
	{
		if (is_null($type))
		{
			$this->type = null;
			return;
		}
		else if (!($type instanceof TypeDefinition))
		{
			$type = new TypeDefinition($type, $isNullable);
		}
		
		$this->setupChild($type);
		$this->type = $type;
	}

	/**
	 * @param string $name
	 */
	public function setName(string $name): void
	{
		$this->name = $name;
	}
	
	public function setDefaultValue($value): void
	{
		if (!($value instanceof ConstValueToken))
		{
			$value = new ConstValueToken($value);
		}
	}
}