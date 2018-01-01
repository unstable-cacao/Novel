<?php
namespace Novel\Core\Tokens\Extensions;


use Novel\Core\IToken;


interface ITemplateToken extends IToken
{
	public function getText(): string;
}