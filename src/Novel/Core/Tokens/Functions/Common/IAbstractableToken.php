<?php
namespace Novel\Core\Tokens\Functions\Common;


interface IAbstractableToken
{
	public function isAbstract(): bool;
	public function setIsAbstract(bool $isAbstract): void;
}