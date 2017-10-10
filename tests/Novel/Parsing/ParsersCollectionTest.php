<?php
namespace Novel\Parsing;


use Novel\Core\Parsing\ISymbolChainParser;
use Novel\Core\Parsing\ISymbolMiddlewareParser;
use Novel\Core\Parsing\ISymbolParser;
use Novel\Symbols\WhiteSpace\SpaceSymbol;
use Novel\Symbols\WhiteSpace\TabSymbol;
use PHPUnit\Framework\TestCase;


class ParsersCollectionTest extends TestCase
{
	private function mockParser(): ISymbolParser
	{
		/** @noinspection PhpIncompatibleReturnTypeInspection */
		return $this->getMockBuilder(ISymbolParser::class)->getMock();
	}
	
	private function mockMiddlewareParser(): ISymbolMiddlewareParser
	{
		/** @noinspection PhpIncompatibleReturnTypeInspection */
		return $this->getMockBuilder(ISymbolMiddlewareParser::class)->getMock();
	}
	
	private function mockChainParser(): ISymbolChainParser
	{
		/** @noinspection PhpIncompatibleReturnTypeInspection */
		return $this->getMockBuilder(ISymbolChainParser::class)->getMock();
	}
	
	
	public function test_ReturnSelf()
	{
		$parser= $this->mockParser();
		
		$subject = new ParsersCollection();
		
		self::assertEquals($subject, $subject->add($parser));
		self::assertEquals($subject, $subject->addByType(SpaceSymbol::class, $parser));
	}
	
	
	public function test_getParsers_Empty_ReturnEmpty()
	{
		$symbol = new SpaceSymbol();
		
		$subject = new ParsersCollection();
		
		self::assertEquals([], $subject->getParsers($symbol));
	}
	
	public function test_getParsers_HasByType_ReturnByType()
	{
		$symbol = new SpaceSymbol();
		$parser = $this->mockParser();
		
		$subject = new ParsersCollection();
		$subject->addByType(SpaceSymbol::class, $parser);
		
		self::assertEquals([$parser], $subject->getParsers($symbol));
	}
	
	public function test_getParsers_HasParsers_ReturnParsers()
	{
		$symbol = new SpaceSymbol();
		$parser = $this->mockParser();
		
		$subject = new ParsersCollection();
		$subject->add($parser);
		
		self::assertEquals([$parser], $subject->getParsers($symbol));
	}
	
	public function test_getParsers_HasByTypeAndParsers_ReturnAll()
	{
		$symbol = new SpaceSymbol();
		$parser = $this->mockParser();
		$parser2 = $this->mockParser();
		
		$subject = new ParsersCollection();
		$subject->add($parser);
		$subject->addByType(SpaceSymbol::class, $parser2);
		
		self::assertEquals([$parser2, $parser], $subject->getParsers($symbol));
	}
	
	public function test_getMiddlewareParsers_Empty_ReturnEmpty()
	{
		$symbol = new SpaceSymbol();
		
		$subject = new ParsersCollection();
		
		self::assertEquals([], $subject->getMiddlewareParsers($symbol));
	}
	
	public function test_getMiddlewareParsers_HasByType_ReturnByType()
	{
		$symbol = new SpaceSymbol();
		$parser = $this->mockMiddlewareParser();
		
		$subject = new ParsersCollection();
		$subject->addByType(SpaceSymbol::class, $parser);
		
		self::assertEquals([$parser], $subject->getMiddlewareParsers($symbol));
	}
	
	public function test_getMiddlewareParsers_HasParsers_ReturnParsers()
	{
		$symbol = new SpaceSymbol();
		$parser = $this->mockMiddlewareParser();
		
		$subject = new ParsersCollection();
		$subject->add($parser);
		
		self::assertEquals([$parser], $subject->getMiddlewareParsers($symbol));
	}
	
	public function test_getMiddlewareParsers_HasByTypeAndParsers_ReturnAll()
	{
		$symbol = new SpaceSymbol();
		$parser = $this->mockMiddlewareParser();
		$parser2 = $this->mockMiddlewareParser();
		
		$subject = new ParsersCollection();
		$subject->add($parser);
		$subject->addByType(SpaceSymbol::class, $parser2);
		
		self::assertEquals([$parser2, $parser], $subject->getMiddlewareParsers($symbol));
	}
	
	public function test_getChainParsers_Empty_ReturnEmpty()
	{
		$symbol = new SpaceSymbol();
		
		$subject = new ParsersCollection();
		
		self::assertEquals([], $subject->getChainParsers($symbol));
	}
	
	public function test_getChainParsers_HasByType_ReturnByType()
	{
		$symbol = new SpaceSymbol();
		$parser = $this->mockChainParser();
		
		$subject = new ParsersCollection();
		$subject->addByType(SpaceSymbol::class, $parser);
		
		self::assertEquals([$parser], $subject->getChainParsers($symbol));
	}
	
	public function test_getChainParsers_HasParsers_ReturnParsers()
	{
		$symbol = new SpaceSymbol();
		$parser = $this->mockChainParser();
		
		$subject = new ParsersCollection();
		$subject->add($parser);
		
		self::assertEquals([$parser], $subject->getChainParsers($symbol));
	}
	
	public function test_getChainParsers_HasByTypeAndParsers_ReturnAll()
	{
		$symbol = new SpaceSymbol();
		$parser = $this->mockChainParser();
		$parser2 = $this->mockChainParser();
		
		$subject = new ParsersCollection();
		$subject->add($parser);
		$subject->addByType(SpaceSymbol::class, $parser2);
		
		self::assertEquals([$parser2, $parser], $subject->getChainParsers($symbol));
	}
	
	
	public function test_add_Parser_AddsToParsers()
	{
		$symbol = new SpaceSymbol();
		$parser = $this->mockParser();
		
		$subject = new ParsersCollection();
		$subject->add($parser);
		
		self::assertEquals([$parser], $subject->getParsers($symbol));
	}
	
	public function test_add_Middleware_AddsToMiddlewares()
	{
		$symbol = new SpaceSymbol();
		$parser = $this->mockMiddlewareParser();
		
		$subject = new ParsersCollection();
		$subject->add($parser);
		
		self::assertEquals([$parser], $subject->getMiddlewareParsers($symbol));
	}
	
	public function test_add_Chain_AddsToChains()
	{
		$symbol = new SpaceSymbol();
		$parser = $this->mockChainParser();
		
		$subject = new ParsersCollection();
		$subject->add($parser);
		
		self::assertEquals([$parser], $subject->getChainParsers($symbol));
	}
	
	public function test_add_SeveralParsers_AddsAll()
	{
		$symbol = new SpaceSymbol();
		$parser = $this->mockParser();
		$parser2 = $this->mockMiddlewareParser();
		
		$subject = new ParsersCollection();
		$subject->add([$parser, $parser2]);
		
		self::assertEquals([$parser], $subject->getParsers($symbol));
		self::assertEquals([$parser2], $subject->getMiddlewareParsers($symbol));
	}
	
	public function test_addByType_Parser_AddsToParsers()
	{
		$symbol = new SpaceSymbol();
		$parser = $this->mockParser();
		
		$subject = new ParsersCollection();
		$subject->addByType(SpaceSymbol::class, $parser);
		
		self::assertEquals([$parser], $subject->getParsers($symbol));
	}
	
	public function test_addByType_Middleware_AddsToMiddlewares()
	{
		$symbol = new SpaceSymbol();
		$parser = $this->mockMiddlewareParser();
		
		$subject = new ParsersCollection();
		$subject->addByType(SpaceSymbol::class, $parser);
		
		self::assertEquals([$parser], $subject->getMiddlewareParsers($symbol));
	}
	
	public function test_addByType_Chain_AddsToChains()
	{
		$symbol = new SpaceSymbol();
		$parser = $this->mockChainParser();
		
		$subject = new ParsersCollection();
		$subject->addByType(SpaceSymbol::class, $parser);
		
		self::assertEquals([$parser], $subject->getChainParsers($symbol));
	}
	
	public function test_addByType_TwoTypesOneParser_AddsToBoth()
	{
		$symbol = new SpaceSymbol();
		$symbol2 = new TabSymbol();
		$parser = $this->mockParser();
		
		$subject = new ParsersCollection();
		$subject->addByType([SpaceSymbol::class, TabSymbol::class], $parser);
		
		self::assertEquals([$parser], $subject->getParsers($symbol));
		self::assertEquals([$parser], $subject->getParsers($symbol2));
	}
	
	public function test_addByType_OneTypeTwoParsers_AddsBothToType()
	{
		$symbol = new SpaceSymbol();
		$parser = $this->mockParser();
		$parser2 = $this->mockParser();
		
		$subject = new ParsersCollection();
		$subject->addByType(SpaceSymbol::class, [$parser, $parser2]);
		
		self::assertEquals([$parser, $parser2], $subject->getParsers($symbol));
	}
	
	public function test_addByType_TwoTypesTwoParsers_AddsToAllTypesAllParsers()
	{
		$symbol = new SpaceSymbol();
		$symbol2 = new TabSymbol();
		$parser = $this->mockParser();
		$parser2 = $this->mockParser();
		
		$subject = new ParsersCollection();
		$subject->addByType([SpaceSymbol::class, TabSymbol::class], [$parser, $parser2]);
		
		self::assertEquals([$parser, $parser2], $subject->getParsers($symbol));
		self::assertEquals([$parser, $parser2], $subject->getParsers($symbol2));
	}
}