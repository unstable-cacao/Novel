<?php
namespace Novel\Core\Tokens\Functions\Common;


interface IStaticableToken
{
	public function isStatic(): bool;
	public function setIsStatic(bool $isStatic): void;
}