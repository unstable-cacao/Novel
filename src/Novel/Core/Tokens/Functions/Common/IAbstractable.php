<?php
namespace Novel\Core\Tokens\Functions\Common;


interface IAbstractable
{
	public function isAbstract(): bool;
	public function setIsAbstract(bool $isAbstract): void;
}