<?php
namespace Novel\Tokens\Statements;


use Novel\Consts\Tokens\StatementNames;
use Novel\Core\Tokens\Expressions\IExpression;
use Novel\Core\Tokens\IfStatement\IElseScope;
use Novel\Core\Tokens\IfStatement\IIfScope;
use Novel\Core\Tokens\Statements\IIfStatementToken;
use Novel\Tokens\Base\AbstractStatementToken;
use Novel\Tokens\IfStatement\ElseScope;
use Novel\Tokens\IfStatement\IfScope;


class IfStatementToken extends AbstractStatementToken implements IIfStatementToken
{
	/** @var IIfScope[] */
	private $ifScopes = [];
	
	/** @var IElseScope|null */
	private $elseScope = null;
	
	
	public function __construct()
	{
		parent::__construct(StatementNames::IF_STATEMENT);
	}


	/**
	 * @return IIfScope[]
	 */
	public function getAllStatements(): array
	{
		return $this->ifScopes;
	}
	
	public function getIfStatement($index): ?IfStatementToken
	{
		return $this->ifScopes[$index] ?? null;
	}
	
	public function addIfStatement(IExpression $expr = null, $body = null, &$index = null): ?IIfScope
	{
		$index = count($this->ifScopes);
		
		/** @var IIfScope $ifScope */
		$ifScope = $this->setupChild(new IfScope($expr, $body));
		$this->ifScopes[] = $ifScope;
		
		return $ifScope;
	}
	
	public function getElseScope(): ?IElseScope
	{
		return $this->elseScope;
	}
	
	public function addElseScope($body = null): IElseScope
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