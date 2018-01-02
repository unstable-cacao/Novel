<?php
namespace Novel\Tokens\Functions\Common;


use Novel\Core\IToken;
use Novel\Core\Tokens\ICodeScopeToken;


trait TWithBody
{
	/** @var ICodeScopeToken */
	private $body;
	
	
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