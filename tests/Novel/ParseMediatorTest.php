<?php
namespace Novel;


use Novel\Core\Parsing\IIdentChainParser;
use Novel\Core\Parsing\IIdentMiddlewareParser;
use Novel\Core\Parsing\IIdentParser;
use Novel\Idents\WhiteSpace\SpaceIdent;
use PHPUnit\Framework\TestCase;


class ParseMediatorTest extends TestCase
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
		$subject = new ParseMediator();
		
		self::assertEquals('', $subject->parse([]));
	}
	
	public function test_parse_HasPreString_PrefixesTheResult()
	{
		$subject = new ParseMediator();
		$subject->getSetup()->add([$this->mockParser(), $this->mockPreChainParser()]);
		
		self::assertEquals('PreSpace', $subject->parse([new SpaceIdent()]));
	}
	
	public function test_parse_HasPostString_PostfixesTheResult()
	{
		$subject = new ParseMediator();
		$subject->getSetup()->add([$this->mockParser(), $this->mockPostChainParser()]);
		
		self::assertEquals('SpacePost', $subject->parse([new SpaceIdent()]));
	}
	
	/**
	 * @expectedException \Exception
	 */
	public function test_parse_HasNoMain_ExceptionThrown()
	{
		$subject = new ParseMediator();
		$subject->parse([new SpaceIdent()]);
	}
	
	public function test_parse_HasMiddleware_MiddlewareExecuted()
	{
		$subject = new ParseMediator();
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
		
		$subject->parse([new SpaceIdent()]);
		
		self::assertTrue($called);
	}
	
	public function test_parse_HasMiddleware_MiddlewareResultReturned()
	{
		$subject = new ParseMediator();
		$middleware = $this->getMockBuilder(IIdentMiddlewareParser::class)->getMock();
		$middleware->method('parse')->willReturn('Middle');
		$subject->getSetup()->add([$this->mockParser(), $middleware]);
		
		self::assertEquals('Middle', $subject->parse([new SpaceIdent()]));
	}
	
	public function test_parse_HasTwoMiddlewares_FirstMiddlewareCalledBySecond()
	{
		$subject = new ParseMediator();
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
		
		$subject->parse([new SpaceIdent()]);
		
		self::assertTrue($called);
	}
}