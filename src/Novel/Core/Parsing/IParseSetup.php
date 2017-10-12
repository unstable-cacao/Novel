<?php
namespace Novel\Core\Parsing;


interface IParseSetup
{
	/**
	 * @param ISymbolParsingObject|ISymbolParsingObject[] $object
	 * @return IParseSetup
	 */
	public function add($object): IParseSetup;
	
	/**
	 * @param string|array $type
	 * @param ISymbolParsingObject|ISymbolParsingObject[] $object
	 * @return IParseSetup
	 */
	public function addByType($type, $object): IParseSetup;
}