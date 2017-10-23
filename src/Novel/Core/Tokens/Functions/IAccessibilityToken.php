<?php
namespace Novel\Core\Tokens\Functions;


use Novel\Core\IToken;


interface IAccessibilityToken extends IToken
{
	public function setLevel(?string $level): void;
	public function getLevel(): ?string;
	
	public function isDefined(): bool;
	
	public function isPrivate(): bool;
	public function isProtected(): bool;
	public function isPublic(): bool;
}