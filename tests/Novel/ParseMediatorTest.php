<?php
namespace Novel;


use Novel\Core\Parsing\ISymbolChainParser;
use Novel\Core\Parsing\ISymbolMiddlewareParser;
use Novel\Core\Parsing\ISymbolParser;
use Novel\Symbols\WhiteSpace\SpaceSymbol;
use PHPUnit\Framework\TestCase;


class ParseMediatorTest extends TestCase
{
	private function mockParser(): ISymbolParser
	{
		$mock = $this->getMockBuilder(ISymbolParser::class)->getMock();
		$mock->method('parse')->willReturn('Space');
		
		/** @noinspection PhpIncompatibleReturnTypeInspection */
		return $mock;
	}
	
	private function mockPreChainParser(): ISymbolChainParser
	{
		$mock = $this->getMockBuilder(ISymbolChainParser::class)->getMock();
		$mock->method('preParse')->willReturn('Pre');
		
		/** @noinspection PhpIncompatibleReturnTypeInspection */
		return $mock;
	}
	
	private function mockPostChainParser(): ISymbolChainParser
	{
		$mock = $this->getMockBuilder(ISymbolChainParser::class)->getMock();
		$mock->method('postParse')->willReturn('Post');
		
		/** @noinspection PhpIncompatibleReturnTypeInspection */
		return $mock;
	}
	
	
	public function test_parse_Empty_ReturnEmptyString()
	{
		$subject = new ParseMediator();
		
		self::assertEquals('', $subject->parse([]));
	}
	
	public function test_parse_HasPreString_PrefixesTheResult()
	{
		$subject = new ParseMediator();
		$subject->getSetup()->add([$this->mockParser(), $this->mockPreChainParser()]);
		
		self::assertEquals('PreSpace', $subject->parse([new SpaceSymbol()]));
	}
	
	public function test_parse_HasPostString_PostfixesTheResult()
	{
		$subject = new ParseMediator();
		$subject->getSetup()->add([$this->mockParser(), $this->mockPostChainParser()]);
		
		self::assertEquals('SpacePost', $subject->parse([new SpaceSymbol()]));
	}
	
	/**
	 * @expectedException \Exception
	 */
	public function test_parse_HasNoMain_ExceptionThrown()
	{
		$subject = new ParseMediator();
		$subject->parse([new SpaceSymbol()]);
	}
	
	public function test_parse_HasMiddleware_MiddlewareExecuted()
	{
		$subject = new ParseMediator();
		$called = false;
		$middleware = $this->getMockBuilder(ISymbolMiddlewareParser::class)->getMock();
		$middleware->method('parse')->will($this->returnCallback(
			function () use (&$called)
			{
				$called = true;
				return '';
			}
		));
		$subject->getSetup()->add([$this->mockParser(), $middleware]);
		
		$subject->parse([new SpaceSymbol()]);
		
		self::assertTrue($called);
	}
	
	public function test_parse_HasMiddleware_MiddlewareResultReturned()
	{
		$subject = new ParseMediator();
		$middleware = $this->getMockBuilder(ISymbolMiddlewareParser::class)->getMock();
		$middleware->method('parse')->willReturn('Middle');
		$subject->getSetup()->add([$this->mockParser(), $middleware]);
		
		self::assertEquals('Middle', $subject->parse([new SpaceSymbol()]));
	}
	
	public function test_parse_HasTwoMiddlewares_FirstMiddlewareCalledBySecond()
	{
		$subject = new ParseMediator();
		$called = false;
		
		$middleware = $this->getMockBuilder(ISymbolMiddlewareParser::class)->getMock();
		$middleware->method('parse')->will($this->returnCallback(
			function () use (&$called)
			{
				$called = true;
				return '';
			}
		));
		
		$middleware2 = $this->getMockBuilder(ISymbolMiddlewareParser::class)->getMock();
		$middleware2->method('parse')->will($this->returnCallback(
			function ($symbol, $callback)
			{
				$callback();
				return '';
			}
		));
		
		$subject->getSetup()->add([$this->mockParser(), $middleware, $middleware2]);
		
		$subject->parse([new SpaceSymbol()]);
		
		self::assertTrue($called);
	}
}