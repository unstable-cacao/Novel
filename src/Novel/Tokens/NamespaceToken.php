<?php
namespace Novel\Tokens;


use Novel\Consts\Tokens\TokenNames;
use Novel\Tokens\Base\AbstractTreeToken;


class NamespaceToken extends AbstractTreeToken
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