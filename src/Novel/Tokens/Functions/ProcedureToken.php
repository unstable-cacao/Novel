<?php
namespace Novel\Tokens\Functions;


use Novel\Core\IToken;
use Novel\Core\Tokens\Functions\IProcedureToken;
use Novel\Core\Tokens\Functions\IUseScopeToken;


class ProcedureToken extends AbstractFunctionToken implements IProcedureToken
{
	/** @var IUseScopeToken|null */
	private $useScope;
	
	
	public function hasUseScope(): bool
	{
		return $this->useScope ? true : false;
	}
	
	public function getUseScope(): ?IUseScopeToken
	{
		return $this->useScope;
	}
	
	public function crateUseScope(): IUseScopeToken
	{
		$this->useScope = new UseScopeToken();
		return $this->useScope;
	}
	
	public function setUseScope(?IUseScopeToken $scope): void
	{
		$this->useScope = $scope;
	}
	
	public function count(): int
	{
		return $this->useScope ? 5 : 4;
	}
	
	public function hasChildren(): bool
	{
		return true;
	}
	
	/**
	 * @return IToken[]
	 */
	public function children(): array
	{
		return $this->useScope ? array_merge([$this->useScope, parent::children()]) : parent::children();
	}
}