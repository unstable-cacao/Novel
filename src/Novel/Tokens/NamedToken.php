<?php
namespace Novel\Tokens;


use Novel\Tokens\Base\AbstractTreeToken;
use Novel\Tokens\Base\IExpressionToken;


class NamedToken extends AbstractTreeToken implements IExpressionToken
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