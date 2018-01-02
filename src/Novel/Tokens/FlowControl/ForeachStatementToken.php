<?php
namespace Novel\Tokens\FlowControl;


use Novel\Core\IToken;
use Novel\Core\Tokens\FlowControl\ForeachStatement\IForeachIterationToken;
use Novel\Core\Tokens\FlowControl\IForeachStatementToken;
use Novel\Core\Tokens\ICodeScopeToken;
use Novel\Tokens\Base\AbstractChildlessToken;
use Novel\Tokens\FlowControl\ForeachStatement\ForeachIterationToken;
use Novel\Tokens\Scope\CodeScopeToken;


class ForeachStatementToken extends AbstractChildlessToken implements IForeachStatementToken
{
	/** @var IForeachIterationToken */
	private $iteration;
	
	/** @var ICodeScopeToken */
	private $body;
	
	
	public function __construct()
	{
		$this->body = new CodeScopeToken();
	}
	
	
	public function getIteration(): IForeachIterationToken
	{
		return $this->iteration;
	}
	
	public function getBody(): ICodeScopeToken
	{
		return $this->body;
	}
	
	/**
	 * @param string|IToken $target
	 * @param string|IToken $item
	 * @param string|IToken|null $value IF set, $item is treated as the key and value as the value.
	 * @return IForeachIterationToken
	 */
	public function setIteration($target, $item, $value = null): IForeachIterationToken
	{
		$token = new ForeachIterationToken();
		$token->setTarget($target);
		$token->setProduct($item, $value);
		$this->iteration = $token;
		
		return $token;
	}
}