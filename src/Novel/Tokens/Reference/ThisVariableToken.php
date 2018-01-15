<?php
namespace Novel\Tokens\Reference;


use Novel\Core\Tokens\Reference\IThisVariableToken;
use Novel\Tokens\Base\AbstractChildlessToken;
use Novel\Tokens\Named\TNamedToken;


class ThisVariableToken extends AbstractChildlessToken implements IThisVariableToken
{
	use TNamedToken;
	
	
	public function __construct()
	{
		$this->setName('this');
	}
}