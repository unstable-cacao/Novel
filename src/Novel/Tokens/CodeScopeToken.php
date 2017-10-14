<?php
namespace Novel\Tokens;


use Novel\Core\IToken;
use Novel\Tokens\Base\AbstractToken;


class CodeScopeToken extends AbstractToken
{
	public function __construct()
	{
		// TODO
		parent::__construct('');
	}
	

	/**
	 * @param IToken|IToken[] $token
	 */
	public function add($token)
	{
		$this->addChildrenToArray($token);
	}
}