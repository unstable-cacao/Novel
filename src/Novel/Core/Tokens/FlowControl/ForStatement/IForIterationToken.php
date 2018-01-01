<?php
namespace Novel\Core\Tokens\FlowControl\ForStatement;


use Novel\Core\IToken;


interface IForIterationToken extends IToken
{
	public function setDefinition(IToken $token): void;
	public function setCondition(IToken $token): void;
	public function setOperation(IToken $token): void;
	
	public function getDefinition(): ?IToken;
	public function getCondition(): ?IToken;
	public function getOperation(): ?IToken;
}