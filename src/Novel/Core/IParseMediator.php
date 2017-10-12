<?php
namespace Novel\Core;


use Novel\Core\Parsing\IParseSetup;


interface IParseMediator
{
	public function getSetup(): IParseSetup;
	
	/**
	 * @param ISymbol[] $symbols
	 * @return string
	 */
	public function parse(array $symbols): string;
}