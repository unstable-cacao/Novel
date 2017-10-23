<?php
namespace Novel\Tokens\Definitions;


use Novel\Core\Tokens\IConstValueToken;
use Novel\Tokens\NamedToken;
use Novel\Tokens\ConstValueToken;
use Novel\Tokens\Base\AbstractTreeToken;


class ParameterDefinition extends AbstractTreeToken
{
	/** @var TypeDefinition|null */
	private $type;
	
	/** @var string */
	private $name;
	
	/** @var IConstValueToken */
	private $default;
	
	
	/**
	 * ParameterDefinition constructor.
	 * @param string|NamedToken|TypeDefinition|null $type
	 * @param string $name
	 * @param IConstValueToken|mixed|null $def
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
		if (!($value instanceof IConstValueToken))
		{
			$value = new ConstValueToken($value);
		}
	}
}