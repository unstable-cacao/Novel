<?php
namespace Novel\Tokens;


use Novel\Core\IToken;
use Novel\Core\Tokens\IGlobalScopeToken;
use Novel\Tokens\Base\AbstractParentToken;


class GlobalScopeToken extends AbstractParentToken implements IGlobalScopeToken
{
	/**
	 * @param IToken[] $children
	 */
	public function __construct(?array $children = null)
	{
		parent::__construct('');
		
		if ($children)
			$this->addChildren($children);
	}


	/**
	 * @param IToken|IToken[] $token
	 */
	public function add($token)
	{
		$this->addChildren($token);
	}
}