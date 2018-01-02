<?php
namespace Novel\Tokens\FlowControl\ForStatement;


use Novel\Core\IToken;
use Novel\Core\Tokens\FlowControl\ForStatement\IForIterationToken;
use Novel\Tokens\Base\AbstractChildlessToken;


class ForIterationToken extends AbstractChildlessToken implements IForIterationToken
{
	/** @var IToken|null */
	private $definition;
	
	/** @var IToken|null */
	private $condition;
	
	/** @var IToken|null */
	private $operation;
	
	
	public function setDefinition(IToken $token): void
	{
		$this->definition = $token;
	}
	
	public function setCondition(IToken $token): void
	{
		$this->condition = $token;
	}
	
	public function setOperation(IToken $token): void
	{
		$this->operation = $token;
	}
	
	public function getDefinition(): ?IToken
	{
		return $this->definition;
	}
	
	public function getCondition(): ?IToken
	{
		return $this->condition;
	}
	
	public function getOperation(): ?IToken
	{
		return $this->operation;
	}
}