<?php
namespace Novel\Core\Parsing;


interface IParserSetup
{
	/**
	 * @param ISymbolParsingObject|ISymbolParsingObject[] $object
	 * @return IParserSetup
	 */
	public function add($object): IParserSetup;
	
	/**
	 * @param string|array $type
	 * @param ISymbolParsingObject|ISymbolParsingObject[] $object
	 * @return IParserSetup
	 */
	public function addByType($type, $object): IParserSetup;
}