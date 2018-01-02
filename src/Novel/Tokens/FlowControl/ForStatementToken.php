<?php
namespace Novel\Tokens\FlowControl;


use Novel\Core\IToken;
use Novel\Core\Tokens\FlowControl\ForStatement\IForIterationToken;
use Novel\Core\Tokens\FlowControl\IForStatementToken;
use Novel\Core\Tokens\ICodeScopeToken;
use Novel\Tokens\Base\AbstractChildlessToken;
use Novel\Tokens\FlowControl\ForStatement\ForIterationToken;
use Novel\Tokens\Scope\CodeScopeToken;


class ForStatementToken extends AbstractChildlessToken implements IForStatementToken
{
	/** @var IForIterationToken */
	private $iteration = null;
	
	/** @var ICodeScopeToken */
	private $body;
	

	public function getIteration(): IForIterationToken
	{
		if (!$this->iteration)
			$this->iteration = new ForIterationToken();
		
		return $this->iteration;
	}

	public function setIterationToken(IForIterationToken $token): IForIterationToken
	{
		$this->iteration = $token;
		return $token;
	}

	public function setIteration(IToken $definition, IToken $condition, IToken $operation): IForIterationToken
	{
		$this->iteration = new ForIterationToken();
		
		$this->iteration->setDefinition($definition);
		$this->iteration->setCondition($condition);
		$this->iteration->setOperation($operation);
		
		return $this->iteration;
	}

	public function setBody(ICodeScopeToken $token): void
	{
		$this->body = $token;
	}

	public function getBody(): ICodeScopeToken
	{
		if (!$this->body)
			$this->body = new CodeScopeToken();
		
		return $this->body;
	}
}