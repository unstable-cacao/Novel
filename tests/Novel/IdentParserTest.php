<?php
namespace Novel;


use Novel\Core\Parsing\IIdentChainParser;
use Novel\Core\Parsing\IIdentMiddlewareParser;
use Novel\Core\Parsing\IIdentParser;
use Novel\Idents\WhiteSpace\Space;
use PHPUnit\Framework\TestCase;


class IdentParserTest extends TestCase
{
	private function mockParser(): IIdentParser
	{
		$mock = $this->getMockBuilder(IIdentParser::class)->getMock();
		$mock->method('parse')->willReturn('Space');
		
		/** @noinspection PhpIncompatibleReturnTypeInspection */
		return $mock;
	}
	
	private function mockPreChainParser(): IIdentChainParser
	{
		$mock = $this->getMockBuilder(IIdentChainParser::class)->getMock();
		$mock->method('preParse')->willReturn('Pre');
		
		/** @noinspection PhpIncompatibleReturnTypeInspection */
		return $mock;
	}
	
	private function mockPostChainParser(): IIdentChainParser
	{
		$mock = $this->getMockBuilder(IIdentChainParser::class)->getMock();
		$mock->method('postParse')->willReturn('Post');
		
		/** @noinspection PhpIncompatibleReturnTypeInspection */
		return $mock;
	}
	
	
	public function test_parse_Empty_ReturnEmptyString()
	{
		$subject = new IdentParser();
		
		self::assertEquals('', $subject->parse([]));
	}
	
	public function test_parse_HasPreString_PrefixesTheResult()
	{
		$subject = new IdentParser();
		$subject->getSetup()->add([$this->mockParser(), $this->mockPreChainParser()]);
		
		self::assertEquals('PreSpace', $subject->parse([new Space()]));
	}
	
	public function test_parse_HasPostString_PostfixesTheResult()
	{
		$subject = new IdentParser();
		$subject->getSetup()->add([$this->mockParser(), $this->mockPostChainParser()]);
		
		self::assertEquals('SpacePost', $subject->parse([new Space()]));
	}
	
	/**
	 * @expectedException \Exception
	 */
	public function test_parse_HasNoMain_ExceptionThrown()
	{
		$subject = new IdentParser();
		$subject->parse([new Space()]);
	}
	
	public function test_parse_HasMiddleware_MiddlewareExecuted()
	{
		$subject = new IdentParser();
		$called = false;
		$middleware = $this->getMockBuilder(IIdentMiddlewareParser::class)->getMock();
		$middleware->method('parse')->will($this->returnCallback(
			function () use (&$called)
			{
				$called = true;
				return '';
			}
		));
		$subject->getSetup()->add([$this->mockParser(), $middleware]);
		
		$subject->parse([new Space()]);
		
		self::assertTrue($called);
	}
	
	public function test_parse_HasMiddleware_MiddlewareResultReturned()
	{
		$subject = new IdentParser();
		$middleware = $this->getMockBuilder(IIdentMiddlewareParser::class)->getMock();
		$middleware->method('parse')->willReturn('Middle');
		$subject->getSetup()->add([$this->mockParser(), $middleware]);
		
		self::assertEquals('Middle', $subject->parse([new Space()]));
	}
	
	public function test_parse_HasTwoMiddlewares_FirstMiddlewareCalledBySecond()
	{
		$subject = new IdentParser();
		$called = false;
		
		$middleware = $this->getMockBuilder(IIdentMiddlewareParser::class)->getMock();
		$middleware->method('parse')->will($this->returnCallback(
			function () use (&$called)
			{
				$called = true;
				return '';
			}
		));
		
		$middleware2 = $this->getMockBuilder(IIdentMiddlewareParser::class)->getMock();
		$middleware2->method('parse')->will($this->returnCallback(
			function ($ident, $callback)
			{
				$callback();
				return '';
			}
		));
		
		$subject->getSetup()->add([$this->mockParser(), $middleware, $middleware2]);
		
		$subject->parse([new Space()]);
		
		self::assertTrue($called);
	}
}