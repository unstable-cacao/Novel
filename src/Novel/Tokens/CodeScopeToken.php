<?php
namespace Novel\Tokens;


use Novel\Consts\Tokens\TokenNames;
use Novel\Core\IToken;
use Novel\Core\Tokens\ICodeScopeToken;
use Novel\Tokens\Base\AbstractTreeToken;


class CodeScopeToken extends AbstractTreeToken implements ICodeScopeToken
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