<?php
namespace Novel\Core\Tokens\OOP\Accessibility;


use Novel\Core\IToken;


interface IWithAccessibilityToken extends IToken
{
	public function getAccessibilityToken(): IAccessibilityToken;
	public function getAccessibility(): ?string;

	/**
	 * @param string|IAccessibilityToken|null $level
	 */
	public function setAccessibility($level): void;
}