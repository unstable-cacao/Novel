<?php
namespace Novel\Core;


use Novel\Core\Parsing\IParserSetup;


interface IParseMediator
{
	public function getSetup(): IParserSetup;
	
	/**
	 * @param ISymbol[] $symbols
	 * @return string
	 */
	public function parse(array $symbols): string;
}