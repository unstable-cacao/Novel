<?php
namespace Novel\Tokens\Consts;


use Novel\Core\IToken;
use Novel\Core\Tokens\Consts\IConstDeclarationToken;
use Novel\Tokens\Base\AbstractChildlessToken;
use Novel\Tokens\Named\TNamedToken;


class ConstDeclarationToken extends AbstractChildlessToken implements IConstDeclarationToken
{
	use TNamedToken;
	
	
	/** @var IToken */
	private $value;
	
	
	public function __construct($name = null, $value = null)
	{
		if ($name)
		{
			$this->setName($name);
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