<?php
namespace Novel;


use Novel\Config\NovelConfig;
use Novel\Core\Parsing\IParseSetup;
use Novel\Core\Transforming\ITransformSetup;
use PHPUnit\Framework\TestCase;


class NovelTest extends TestCase
{
	public function test_getConfig_ReturnNovelConfig()
	{
		$subject = new Novel();
		
		self::assertInstanceOf(NovelConfig::class, $subject->getConfig());
	}
	
	public function test_getConfig_ParserConfigHasIParserSetup()
	{
		$subject = new Novel();
		$config = $subject->getConfig();
		
		self::assertInstanceOf(IParseSetup::class, $config->ParserConfig);
	}
	
	public function test_getConfig_TransferConfigHasITransformSetup()
	{
		$subject = new Novel();
		$config = $subject->getConfig();
		
		self::assertInstanceOf(ITransformSetup::class, $config->TransferConfig);
	}
}