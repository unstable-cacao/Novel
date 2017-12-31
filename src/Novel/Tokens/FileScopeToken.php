<?php
namespace Novel\Tokens;


use Novel\Core\IToken;
use Novel\Core\Tokens\IFileScopeToken;
use Novel\Tokens\Base\AbstractParentToken;


class FileScopeToken extends AbstractParentToken implements IFileScopeToken
{
	/**
	 * @param IToken[] $children
	 */
	public function __construct(?array $children = null)
	{
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