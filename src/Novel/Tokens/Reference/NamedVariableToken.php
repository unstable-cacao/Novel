<?php
namespace Novel\Tokens\Reference;


use Novel\Core\IToken;
use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INameToken;
use Novel\Core\Tokens\Reference\INamedVariableToken;

use Novel\Tokens\Base\AbstractSingleChildToken;
use Novel\Tokens\Named\TNamedToken;


class NamedVariableToken extends AbstractSingleChildToken implements INamedVariableToken
{
	use TNamedToken;
	
	
	/**
	 * @param string|IName|INameToken|null $name
	 */
	public function __construct($name = null)
	{
		if ($name)
			$this->setName($name);
	}
	
	
	/**
	 * @return IToken[]
	 */
	public function children(): array
	{
		return [$this->getNameToken()];
	}
}