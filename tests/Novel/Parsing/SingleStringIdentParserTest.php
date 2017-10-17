<?php
namespace Novel\Parsing;


use Novel\Symbols\ConstStringSymbol;
use Novel\Symbols\Keyword\NewSymbol;
use PHPUnit\Framework\TestCase;


class SingleStringSymbolParserTest extends TestCase
{
	public function test_parse_InstanceOfAbstractSingleStringSymbol_ReturnSymbolString()
	{
		$subject = new SingleStringSymbolParser();
		$symbol = new NewSymbol();
		
		self::assertEquals("new", $subject->parse($symbol));
	}
	
	public function test_parse_NotInstanceOfAbstractSingleStringSymbol_ReturnNull()
	{
		$subject = new SingleStringSymbolParser();
		$symbol = new ConstStringSymbol("test");
		
		self::assertNull($subject->parse($symbol));
	}
}