<?php
namespace Novel\Tokens\Reference;


use Novel\Core\IToken;
use Novel\Core\Tokens\Reference\INamedVariableToken;
use Novel\Tokens\TNamedToken;
use Novel\Tokens\Base\AbstractSingleChildToken;


class NamedVariableToken extends AbstractSingleChildToken implements INamedVariableToken
{
	use TNamedToken;
	
	
	/**
	 * @return IToken[]
	 */
	public function children(): array
	{
		return [$this->getNameToken()];
	}
}