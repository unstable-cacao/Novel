<?php
namespace Novel\Core\Tokens;


use Novel\Core\IToken;


interface INameToken extends IToken
{
	public function getName(): string;
	public function getNameObject(): IName;
}