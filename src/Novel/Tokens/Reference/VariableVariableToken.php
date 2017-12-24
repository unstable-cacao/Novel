<?php
namespace Novel\Tokens\Reference;


use Novel\Core\IToken;
use Novel\Core\Tokens\Generic\IValueExpressionToken;
use Novel\Core\Tokens\Reference\IVariableVariableToken;
use Novel\Tokens\Base\AbstractSingleChildToken;


class VariableVariableToken extends AbstractSingleChildToken implements IVariableVariableToken
{
	private $subject = null;
	
	
	public function __construct(?IValueExpressionToken $token = null)
	{
		if ($token)
			$this->subject = $token;
	}


	/**
	 * @return IToken[]
	 */
	public function children(): array
	{
		return [$this->subject];
	}

	public function getSubject(): IValueExpressionToken
	{
		return $this->subject;
	}

	public function setSubject(IValueExpressionToken $subject)
	{
		$this->subject = $subject;
	}
}