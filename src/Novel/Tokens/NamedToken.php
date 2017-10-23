<?php
namespace Novel\Tokens;


use Novel\Tokens\Base\AbstractTreeToken;


class NamedToken extends AbstractTreeToken
{
	/** @var string */
	private $name;
	
	
	public function __construct(string $name)
	{
		parent::__construct('');
		$this->name = $name;
	}
	
	
	public function getName(): string 
	{
		return $this->name;
	}
	
	public function setName(string $name)
	{
		$this->name = $name;
	}
}