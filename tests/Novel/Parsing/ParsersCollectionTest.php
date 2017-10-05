<?php
namespace Novel\Parsing;


use Novel\Core\Parsing\IIdentChainParser;
use Novel\Core\Parsing\IIdentMiddlewareParser;
use Novel\Core\Parsing\IIdentParser;
use Novel\Idents\WhiteSpace\Space;
use Novel\Idents\WhiteSpace\Tab;
use PHPUnit\Framework\TestCase;


class ParsersCollectionTest extends TestCase
{
	private function mockParser(): IIdentParser
	{
		/** @noinspection PhpIncompatibleReturnTypeInspection */
		return $this->getMockBuilder(IIdentParser::class)->getMock();
	}
	
	private function mockMiddlewareParser(): IIdentMiddlewareParser
	{
		/** @noinspection PhpIncompatibleReturnTypeInspection */
		return $this->getMockBuilder(IIdentMiddlewareParser::class)->getMock();
	}
	
	private function mockChainParser(): IIdentChainParser
	{
		/** @noinspection PhpIncompatibleReturnTypeInspection */
		return $this->getMockBuilder(IIdentChainParser::class)->getMock();
	}
	
	
	public function test_ReturnSelf()
	{
		$parser= $this->mockParser();
		
		$subject = new ParsersCollection();
		
		self::assertEquals($subject, $subject->add($parser));
		self::assertEquals($subject, $subject->addByType(Space::class, $parser));
	}
	
	
	public function test_getParsers_Empty_ReturnEmpty()
	{
		$ident = new Space();
		
		$subject = new ParsersCollection();
		
		self::assertEquals([], $subject->getParsers($ident));
	}
	
	public function test_getParsers_HasByType_ReturnByType()
	{
		$ident = new Space();
		$parser = $this->mockParser();
		
		$subject = new ParsersCollection();
		$subject->addByType(Space::class, $parser);
		
		self::assertEquals([$parser], $subject->getParsers($ident));
	}
	
	public function test_getParsers_HasParsers_ReturnParsers()
	{
		$ident = new Space();
		$parser = $this->mockParser();
		
		$subject = new ParsersCollection();
		$subject->add($parser);
		
		self::assertEquals([$parser], $subject->getParsers($ident));
	}
	
	public function test_getParsers_HasByTypeAndParsers_ReturnAll()
	{
		$ident = new Space();
		$parser = $this->mockParser();
		$parser2 = $this->mockParser();
		
		$subject = new ParsersCollection();
		$subject->add($parser);
		$subject->addByType(Space::class, $parser2);
		
		self::assertEquals([$parser2, $parser], $subject->getParsers($ident));
	}
	
	public function test_getMiddlewareParsers_Empty_ReturnEmpty()
	{
		$ident = new Space();
		
		$subject = new ParsersCollection();
		
		self::assertEquals([], $subject->getMiddlewareParsers($ident));
	}
	
	public function test_getMiddlewareParsers_HasByType_ReturnByType()
	{
		$ident = new Space();
		$parser = $this->mockMiddlewareParser();
		
		$subject = new ParsersCollection();
		$subject->addByType(Space::class, $parser);
		
		self::assertEquals([$parser], $subject->getMiddlewareParsers($ident));
	}
	
	public function test_getMiddlewareParsers_HasParsers_ReturnParsers()
	{
		$ident = new Space();
		$parser = $this->mockMiddlewareParser();
		
		$subject = new ParsersCollection();
		$subject->add($parser);
		
		self::assertEquals([$parser], $subject->getMiddlewareParsers($ident));
	}
	
	public function test_getMiddlewareParsers_HasByTypeAndParsers_ReturnAll()
	{
		$ident = new Space();
		$parser = $this->mockMiddlewareParser();
		$parser2 = $this->mockMiddlewareParser();
		
		$subject = new ParsersCollection();
		$subject->add($parser);
		$subject->addByType(Space::class, $parser2);
		
		self::assertEquals([$parser2, $parser], $subject->getMiddlewareParsers($ident));
	}
	
	public function test_getChainParsers_Empty_ReturnEmpty()
	{
		$ident = new Space();
		
		$subject = new ParsersCollection();
		
		self::assertEquals([], $subject->getChainParsers($ident));
	}
	
	public function test_getChainParsers_HasByType_ReturnByType()
	{
		$ident = new Space();
		$parser = $this->mockChainParser();
		
		$subject = new ParsersCollection();
		$subject->addByType(Space::class, $parser);
		
		self::assertEquals([$parser], $subject->getChainParsers($ident));
	}
	
	public function test_getChainParsers_HasParsers_ReturnParsers()
	{
		$ident = new Space();
		$parser = $this->mockChainParser();
		
		$subject = new ParsersCollection();
		$subject->add($parser);
		
		self::assertEquals([$parser], $subject->getChainParsers($ident));
	}
	
	public function test_getChainParsers_HasByTypeAndParsers_ReturnAll()
	{
		$ident = new Space();
		$parser = $this->mockChainParser();
		$parser2 = $this->mockChainParser();
		
		$subject = new ParsersCollection();
		$subject->add($parser);
		$subject->addByType(Space::class, $parser2);
		
		self::assertEquals([$parser2, $parser], $subject->getChainParsers($ident));
	}
	
	
	public function test_add_Parser_AddsToParsers()
	{
		$ident = new Space();
		$parser = $this->mockParser();
		
		$subject = new ParsersCollection();
		$subject->add($parser);
		
		self::assertEquals([$parser], $subject->getParsers($ident));
	}
	
	public function test_add_Middleware_AddsToMiddlewares()
	{
		$ident = new Space();
		$parser = $this->mockMiddlewareParser();
		
		$subject = new ParsersCollection();
		$subject->add($parser);
		
		self::assertEquals([$parser], $subject->getMiddlewareParsers($ident));
	}
	
	public function test_add_Chain_AddsToChains()
	{
		$ident = new Space();
		$parser = $this->mockChainParser();
		
		$subject = new ParsersCollection();
		$subject->add($parser);
		
		self::assertEquals([$parser], $subject->getChainParsers($ident));
	}
	
	public function test_add_SeveralParsers_AddsAll()
	{
		$ident = new Space();
		$parser = $this->mockParser();
		$parser2 = $this->mockMiddlewareParser();
		
		$subject = new ParsersCollection();
		$subject->add([$parser, $parser2]);
		
		self::assertEquals([$parser], $subject->getParsers($ident));
		self::assertEquals([$parser2], $subject->getMiddlewareParsers($ident));
	}
	
	public function test_addByType_Parser_AddsToParsers()
	{
		$ident = new Space();
		$parser = $this->mockParser();
		
		$subject = new ParsersCollection();
		$subject->addByType(Space::class, $parser);
		
		self::assertEquals([$parser], $subject->getParsers($ident));
	}
	
	public function test_addByType_Middleware_AddsToMiddlewares()
	{
		$ident = new Space();
		$parser = $this->mockMiddlewareParser();
		
		$subject = new ParsersCollection();
		$subject->addByType(Space::class, $parser);
		
		self::assertEquals([$parser], $subject->getMiddlewareParsers($ident));
	}
	
	public function test_addByType_Chain_AddsToChains()
	{
		$ident = new Space();
		$parser = $this->mockChainParser();
		
		$subject = new ParsersCollection();
		$subject->addByType(Space::class, $parser);
		
		self::assertEquals([$parser], $subject->getChainParsers($ident));
	}
	
	public function test_addByType_TwoTypesOneParser_AddsToBoth()
	{
		$ident = new Space();
		$ident2 = new Tab();
		$parser = $this->mockParser();
		
		$subject = new ParsersCollection();
		$subject->addByType([Space::class, Tab::class], $parser);
		
		self::assertEquals([$parser], $subject->getParsers($ident));
		self::assertEquals([$parser], $subject->getParsers($ident2));
	}
	
	public function test_addByType_OneTypeTwoParsers_AddsBothToType()
	{
		$ident = new Space();
		$parser = $this->mockParser();
		$parser2 = $this->mockParser();
		
		$subject = new ParsersCollection();
		$subject->addByType(Space::class, [$parser, $parser2]);
		
		self::assertEquals([$parser, $parser2], $subject->getParsers($ident));
	}
	
	public function test_addByType_TwoTypesTwoParsers_AddsToAllTypesAllParsers()
	{
		$ident = new Space();
		$ident2 = new Tab();
		$parser = $this->mockParser();
		$parser2 = $this->mockParser();
		
		$subject = new ParsersCollection();
		$subject->addByType([Space::class, Tab::class], [$parser, $parser2]);
		
		self::assertEquals([$parser, $parser2], $subject->getParsers($ident));
		self::assertEquals([$parser, $parser2], $subject->getParsers($ident2));
	}
}