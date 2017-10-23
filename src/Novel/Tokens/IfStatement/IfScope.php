<?php
namespace Novel\Tokens\IfStatement;


use Novel\Core\IToken;
use Novel\Consts\Tokens\StatementNames;
use Novel\Core\Tokens\Expressions\IExpression;
use Novel\Core\Tokens\ICodeScopeToken;
use Novel\Core\Tokens\IConstValueToken;
use Novel\Core\Tokens\IfStatement\IIfScope;
use Novel\Tokens\CodeScopeToken;
use Novel\Tokens\Base\AbstractTreeToken;


class IfScope extends AbstractTreeToken implements IIfScope
{
	/** @var ICodeScopeToken */
	private $body;
	
	/** @var IExpression */
	private $condition;
	
	
	/**
	 * @param IExpression|null $condition
	 * @param IToken|IToken[]|null $body
	 */
	public function __construct(IExpression $condition = null, $body = null)
	{
		parent::__construct(StatementNames::IF_SCOPE);
		
		$this->condition = $this->setupChild($condition ?: IConstValueToken::false()); 
		$this->body = $this->setupChild(CodeScopeToken::class);
		
		if ($body)
		{
			$this->body->add($body);
		}
	}
	
	
	public function scope(): ICodeScopeToken
	{
		return $this->body;
	}
	
	public function condition(): IExpression
	{
		return $this->condition;
	}
	
	public function setCondition(IExpression $expr): void
	{
		$this->condition = $this->setupChild($expr);
	}

	/**
	 * @param IToken $token
	 */
	public function addToScope($token)
	{
		$this->scope()->add($token);
	}
}