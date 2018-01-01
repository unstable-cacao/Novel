<?php
namespace Novel\Core\Tokens\Statements;


use Novel\Core\IToken;


interface IExpressionStatementToken extends IStatementToken
{
	public function setStatement(IToken $statement): void;
	public function getStatement(): IToken;
}