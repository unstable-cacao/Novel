<?php
namespace Novel\Core\Tokens\OOP\Common;


use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INamedToken;


interface IImplementsToken
{
	/**
	 * @param string|INamedToken|IName $target
	 */
	public function add($target): void;
}