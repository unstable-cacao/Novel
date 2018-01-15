<?php
namespace Novel\Tokens\Reference;


use Novel\Core\Tokens\Reference\ISelfKeywordToken;
use Novel\Tokens\Base\AbstractChildlessToken;
use Novel\Tokens\Named\TNamedToken;


class SelfKeywordToken extends AbstractChildlessToken implements ISelfKeywordToken
{
	use TNamedToken;
	
	public function __construct()
	{
		$this->setName('self');
	}
}