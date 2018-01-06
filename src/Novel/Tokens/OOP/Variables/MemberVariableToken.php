<?php
namespace Novel\Tokens\OOP\Variables;


use Novel\Core\IToken;
use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INameToken;
use Novel\Core\Tokens\OOP\Variables\IMemberVariableToken;
use Novel\Tokens\Base\AbstractChildlessToken;
use Novel\Tokens\OOP\Accessibility\TWithAccessibilityToken;
use Novel\Tokens\Named\TNamedToken;
use Novel\Tokens\Functions\Common\TStaticable;


class MemberVariableToken extends AbstractChildlessToken implements IMemberVariableToken
{
	use TNamedToken;
	use TWithAccessibilityToken;
	use TStaticable;
	
	
	/** @var IToken|null */
	private $value;
	
	
	/**
	 * @param string|IName|INameToken $name
	 * @param IToken|null $value
	 */
	public function __construct($name, ?IToken $value = null)
	{
		$this->setName($name);
		$this->value = $value;
	}
	
	
	public function setValue(IToken $value): void
	{
		$this->value = $value;
	}
	
	public function getValue(): ?IToken
	{
		return $this->value;
	}
	
	public function hasValue(): bool
	{
		return $this->value ? true : false;
	}
}