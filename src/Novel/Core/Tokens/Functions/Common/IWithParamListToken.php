<?php
namespace Novel\Core\Tokens\Functions\Common;


use Novel\Core\IToken;
use Novel\Core\Tokens\INamedToken;
use Novel\Core\Tokens\Functions\Params\IParamDefinitionToken;
use Novel\Core\Tokens\Functions\Params\IParamListDefinition;


interface IWithParamListToken extends IToken
{
	public function getParamListToken(): IParamListDefinition;

	/**
	 * @param IParamDefinitionToken[]|string[]|INamedToken[]|IParamDefinitionToken|string|INamedToken $item ...$item
	 */
	public function addParam(...$item): void;
}