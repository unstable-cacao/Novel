<?php
namespace Novel\Core\Tokens;


use Novel\Core\IToken;


interface INamedToken extends IToken
{
	/**
	 * @param string|IName|INameToken $name
	 */
	public function setName($name): void;
	
	public function getName(): string;
	public function getNameToken(): INameToken;
	public function getNameObject(): IName;
}