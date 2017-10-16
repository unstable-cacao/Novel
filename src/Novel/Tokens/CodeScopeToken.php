<?php
namespace Novel\Tokens;


use Novel\Consts\Tokens\TokenNames;
use Novel\Core\IToken;
use Novel\Tokens\Base\AbstractToken;


class CodeScopeToken extends AbstractToken
{
	public function __construct()
	{
		parent::__construct(TokenNames::CODE_SCOPE);
	}
	

	/**
	 * @param IToken|IToken[] $token
	 */
	public function add($token)
	{
		$this->addChildrenToArray($token);
	}
}