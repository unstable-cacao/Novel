<?php
namespace Novel\Core\Tokens\Functions;


interface IProcedureDefinitionToken extends IFunctionDefinitionToken
{
	public function hasUseScope(): bool;
	public function getUseScope(): ?IUseScopeToken;
	public function crateUseScope(): IUseScopeToken;
	public function setUseScope(?IUseScopeToken $scope): void;
}