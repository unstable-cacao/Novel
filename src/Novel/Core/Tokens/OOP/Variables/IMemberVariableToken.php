<?php
namespace Novel\Core\Tokens\OOP\Variables;


use Novel\Core\IToken;
use Novel\Core\Tokens\INamedToken;
use Novel\Core\Tokens\Functions\Common\IStaticable;
use Novel\Core\Tokens\OOP\Accessibility\IWithAccessibilityToken;


interface IMemberVariableToken extends
	INamedToken,
	IWithAccessibilityToken,
	IStaticable
{
	public function setValue(IToken $value): void;
	public function getValue(): ?IToken;
	public function hasValue(): bool;
}