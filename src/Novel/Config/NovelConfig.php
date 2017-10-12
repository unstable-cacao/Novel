<?php
namespace Novel\Config;


use Novel\Core\Parsing\IParseSetup;
use Novel\Core\Transforming\ITransformSetup;
use Objection\LiteObject;
use Objection\LiteSetup;


/**
 * @property IParseSetup 		$ParserConfig
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
			'ParserConfig' 		=> LiteSetup::createInstanceOf(IParseSetup::class),
			'TransferConfig' 	=> LiteSetup::createInstanceOf(ITransformSetup::class)
		];
	}
}