<?php
namespace Novel\Tokens;


use Novel\Consts\Tokens\TokenNames;
use Novel\Tokens\Base\AbstractTreeToken;


class UseToken extends AbstractTreeToken
{
	/** @var string */
	private $fullName;
	
	/** @var string|null */
	private $as;
	
	
	public function __construct(string $fullName, ?string $as = null)
	{
		parent::__construct(TokenNames::USE);
		$this->fullName = $fullName;
		$this->as = $as;
	}
	
	
	public function fullName(): string 
	{
		return $this->fullName;
	}
	
	public function getAs(): ?string 
	{
		return $this->as;
	}
	
	public function setAs(string $as): void
	{
		$this->as = $as;
	}
}