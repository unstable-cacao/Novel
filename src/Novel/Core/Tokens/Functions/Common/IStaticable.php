<?php
namespace Novel\Core\Tokens\Functions\Common;


interface IStaticable
{
	public function isStatic(): bool;
	public function setIsStatic(bool $isStatic): void;
}