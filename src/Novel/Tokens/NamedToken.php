<?php
namespace Novel\Tokens;


use Novel\Tokens\Base\AbstractToken;
use Novel\Tokens\Base\IExpressionToken;


class NamedToken extends AbstractToken implements IExpressionToken
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