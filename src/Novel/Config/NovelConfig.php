<?php
namespace Novel\Config;


use Novel\Core\Parsing\IParseSetup;
use Novel\Core\Parsing\ISymbolParser;
use Novel\Core\Transforming\ITokenChainTransform;
use Novel\Core\Transforming\ITokenMiddlewareTransform;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Core\Transforming\ITransformSetup;
use Novel\Setup\StandardClasses;
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
	
	
	public function addStandardParsers(): NovelConfig
	{
		$this->ParserConfig->add(StandardClasses::PARSERS);
		return $this;
	}
	
	public function add(...$items): NovelConfig
	{
		foreach ($items as $item)
		{
			if (is_array($item))
			{
				foreach ($item as $single)
				{
					$this->add($single);
				}
			}
			else
			{
				if (is_string($item))
					$item = new $item;
				
				if ($item instanceof ITokenTransform || 
					$item instanceof ITokenChainTransform || 
					$item instanceof ITokenMiddlewareTransform)
					$this->TransferConfig->add($item);
				
				if ($item instanceof ISymbolParser)
					$this->ParserConfig->add($item);
			}
		}
		
		return $this;
	}
}