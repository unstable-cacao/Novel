<?php
namespace Novel\Tokens\IfStatement;


use Novel\Core\IToken;
use Novel\Consts\Tokens\StatementNames;
use Novel\Core\Tokens\IfStatement\IElseScope;
use Novel\Tokens\CodeScopeToken;
use Novel\Tokens\Base\AbstractTreeToken;


class ElseScope extends AbstractTreeToken implements IElseScope
{
	/** @var CodeScopeToken */
	private $body;
	
	
	/**
	 * @param IToken|IToken[] $body
	 */
	public function __construct($body = null)
	{
		parent::__construct(StatementNames::ELSE_SCOPE);
		
		$this->body = $this->setupChild(CodeScopeToken::class);
		
		if ($body)
		{
			$this->body->add($body);
		}
	}
	
	
	public function scope(): CodeScopeToken
	{
		return $this->body;
	}

	/**
	 * @param IToken $token
	 */
	public function addBody($token)
	{
		$this->scope()->add($token);
	}
}