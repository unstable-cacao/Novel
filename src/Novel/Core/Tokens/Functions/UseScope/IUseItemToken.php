<?php
namespace Novel\Core\Tokens\Functions\UseScope;


use Novel\Core\Tokens\INamedToken;


interface IUseItemToken extends INamedToken
{
	public function setIsByReference(bool $isByReference): void;
	public function isByReference(): bool;
}