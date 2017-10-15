<?php
namespace Novel\Tokens\Statements;


use Novel\Consts\Tokens\StatementNames;
use Novel\Tokens\Base\AbstractStatementToken;
use Novel\Tokens\Base\IExpressionToken;
use Novel\Tokens\IfStatement\ElseScope;
use Novel\Tokens\IfStatement\IfScope;


class IfStatement extends AbstractStatementToken
{
	/** @var IfScope[] */
	private $ifScopes = [];
	
	/** @var ElseScope|null */
	private $elseScope = null;
	
	
	public function __construct()
	{
		parent::__construct(StatementNames::IF_STATEMENT);
	}


	/**
	 * @return IfScope[]
	 */
	public function getAllStatements(): array
	{
		return $this->ifScopes;
	}
	
	public function getIfStatement($index): ?IfStatement
	{
		return $this->ifScopes[$index] ?? null;
	}
	
	public function addIfStatement(IExpressionToken $expr = null, $body = null, &$index = null): ?IfScope
	{
		$index = count($this->ifScopes);
		
		/** @var IfScope $ifScope */
		$ifScope = $this->setupChild(new IfScope($expr, $body));
		$this->ifScopes[] = $ifScope;
		
		return $ifScope;
	}
	
	public function getElseScope(): ?ElseScope
	{
		return $this->elseScope;
	}
	
	public function addElseScope($body = null): ElseScope
	{
		if (!$this->elseScope)
		{
			$this->elseScope = $this->setupChild(ElseScope::class);
		}
		
		if ($body)
		{
			$this->elseScope->addBody($body);
		}
		
		return $this->elseScope;
	}
}