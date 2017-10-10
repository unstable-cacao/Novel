<?php
namespace Novel\Config;


use Novel\Core\Parsing\IParserSetup;
use Novel\Core\Transforming\ITransformSetup;
use Objection\LiteObject;
use Objection\LiteSetup;


/**
 * @property IParserSetup 		$ParserConfig
 * @property ITransformSetup 	$TransferConfig
 */
class NovelConfig extends LiteObject
{
	/**
	 * @return array
	 */
	protected function _setup()
	{
		return [
			'ParserConfig' 		=> LiteSetup::createInstanceOf(IParserSetup::class),
			'TransferConfig' 	=> LiteSetup::createInstanceOf(ITransformSetup::class)
		];
	}
}