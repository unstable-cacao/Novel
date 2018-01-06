<?php
namespace Novel\Tokens\Statements;


use Novel\Core\IToken;
use Novel\Core\Tokens\Statements\IStatementToken;
use Novel\Core\Tokens\Statements\IExpressionStatementToken;
use Novel\Tokens\Base\AbstractChildlessToken;


class ExpressionStatementToken extends AbstractChildlessToken implements IExpressionStatementToken
{
	/** @var IToken */
	private $statement;
	
	
	public function __construct(?IToken $child = null)
	{
		if ($child)
			$this->statement = $child;
	}
	
	
	public function setStatement(IToken $statement): void
	{
		$this->statement = $statement;
	}
	
	public function getStatement(): IToken
	{
		return $this->statement;
	}
	
	public static function toStatement(IToken $target): IStatementToken
	{
		if ($target instanceof IStatementToken)
			return $target;
		
		return new ExpressionStatementToken($target);
	}
}