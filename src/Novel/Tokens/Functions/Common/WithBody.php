<?php
namespace Novel\Tokens\Functions\Common;


use Novel\Core\IToken;
use Novel\Core\Tokens\Functions\Common\IWithBody;
use Novel\Core\Tokens\ICodeScopeToken;
use Novel\Tokens\Scope\CodeScopeToken;


class WithBody implements IWithBody
{
	/** @var ICodeScopeToken */
	private $body;
	
	
	public function __construct()
	{
		$this->body = new CodeScopeToken();
	}
	
	
	public function getBody(): ICodeScopeToken
	{
		return $this->body;
	}
	
	/**
	 * @param IToken[]|IToken ...$item
	 */
	public function addToBody(...$item): void
	{
		$this->body->add(...$item);
	}
}