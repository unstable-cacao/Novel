<?php
namespace Novel\Tokens\OOP\Consts;


use Novel\Core\IToken;
use Novel\Core\Tokens\OOP\Consts\IClassConstDeclarationToken;
use Novel\Tokens\OOP\Accessibility\TWithAccessibilityToken;
use Novel\Tokens\Base\AbstractChildlessToken;
use Novel\Tokens\Named\TNamedToken;
use Novel\Tokens\Consts\ConstValueToken;


class ClassConstDeclarationToken extends AbstractChildlessToken implements IClassConstDeclarationToken
{
	use TNamedToken;
	use TWithAccessibilityToken;

	
	/** @var IToken|null */
	private $value;
	
	
	/**
	 * @param IToken|string|int|float|double|null $value
	 */
	public function __construct($value = null)
	{
		if ($value)
		{
			$this->setValue($value);
		}
	}


	/**
	 * @param IToken|string|int|float|double|null $value
	 */
	public function setValue($value): void
	{
		$this->value = ConstValueToken::toToken($value);
	}

	public function getValue(): IToken
	{
		return $this->value;
	}
}