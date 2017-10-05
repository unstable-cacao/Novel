<?php
namespace Novel\Core;


use Novel\Core\Parsing\IParserSetup;


interface IMainParser
{
	public function getSetup(): IParserSetup;
	
	/**
	 * @param IIdent[] $idents
	 * @return string
	 */
	public function parse(array $idents): string;
}