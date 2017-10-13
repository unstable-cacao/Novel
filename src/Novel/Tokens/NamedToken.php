<?php
namespace Novel\Tokens;


use Novel\Tokens\Base\AbstractToken;


class NamedToken extends AbstractToken
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
}