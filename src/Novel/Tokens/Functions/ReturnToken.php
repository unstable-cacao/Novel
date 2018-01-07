<?php
namespace Novel\Tokens\Functions;


use Novel\Core\IToken;
use Novel\Core\Tokens\Functions\IReturnToken;
use Novel\Tokens\Base\AbstractChildlessToken;
use Novel\Tokens\Consts\ConstValueToken;


class ReturnToken extends AbstractChildlessToken implements IReturnToken
{
	private $item = null;
	
	
	public function __construct($item)
	{
		$this->setValue($item);
	}
	
	
	public function getValue(): IToken
	{
		return $this->item;
	}
	
	/**
	 * @param IToken|mixed $token
	 */
	public function setValue($token): void
	{
		$this->item = ConstValueToken::toToken($token);
	}
}