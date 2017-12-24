<?php
namespace Novel\Core\Tokens\ClassName;


use Novel\Core\Tokens\INameToken;


interface IClassNameToken
{
	public function getNamespace(): string;

	/**
	 * @return string[]
	 */
	public function getPartNames(): array;
	
	/**
	 * @param array|string|INameToken|string[]|INameToken[] ...$parts
	 */
	public function addParts(...$parts): void;
	
}