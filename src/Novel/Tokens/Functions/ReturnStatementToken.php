<?php
namespace Novel\Tokens\Functions;


use Novel\Core\IToken;
use Novel\Core\Tokens\Functions\IReturnStatementToken;
use Novel\Core\Tokens\Generic\IValueExpressionToken;
use Novel\Tokens\Base\AbstractSingleChildToken;


class ReturnStatementToken extends AbstractSingleChildToken implements IReturnStatementToken
{
	/** @var IValueExpressionToken */
	private $statement;
	
	
	public function __construct(?IValueExpressionToken $statement = null)
	{
		if ($statement)
			$this->statement = $statement;
	}
	
	
	public function getStatement(): IToken
	{
		return $this->statement;
	}
	
	public function setStatement(IToken $statement): void
	{
		$this->statement = $statement;
	}
	
	
	/**
	 * @return IToken[]
	 */
	public function children(): array
	{
		return [$this->statement];
	}
}