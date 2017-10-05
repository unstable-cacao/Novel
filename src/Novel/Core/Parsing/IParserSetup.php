<?php
namespace Novel\Core\Parsing;


interface IParserSetup
{
	/**
	 * @param IIdentParsingObject|IIdentParsingObject[] $object
	 * @return IParserSetup
	 */
	public function add($object): IParserSetup;
	
	/**
	 * @param string|array $type
	 * @param IIdentParsingObject|IIdentParsingObject[] $object
	 * @return IParserSetup
	 */
	public function addByType($type, $object): IParserSetup;
}