<?php
namespace Novel\Tokens;


use Novel\Consts\Tokens\TokenNames;
use Novel\Tokens\Base\AbstractToken;


class NamespaceToken extends AbstractToken
{
	/** @var string */
	private $namespace;
	
	
	public function __construct(string $namespace)
	{
		parent::__construct(TokenNames::NAMESPACE);
		$this->namespace = $namespace;
	}
	
	
	public function getNamespace(): string 
	{
		return $this->namespace;
	}
}