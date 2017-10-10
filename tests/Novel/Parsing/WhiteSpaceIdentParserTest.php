<?php
namespace Novel\Parsing;


use Novel\Symbols\Keyword\NewSymbol;
use Novel\Symbols\WhiteSpace\NewLineSymbol;
use Novel\Symbols\WhiteSpace\SpaceSymbol;
use Novel\Symbols\WhiteSpace\TabSymbol;
use PHPUnit\Framework\TestCase;


class WhiteSpaceSymbolParserTest extends TestCase
{
	public function test_ReturnSelf()
	{
		$subject = new WhiteSpaceSymbolParser();
		
		self::assertEquals($subject, $subject->setNewLineCharacter("\n"));
		self::assertEquals($subject, $subject->setTabCharacter("\t"));
	}
	
	public function test_parse_NewLineSymbol_ReturnNewLine()
	{
		$subject = new WhiteSpaceSymbolParser();
		
		self::assertEquals(PHP_EOL, $subject->parse(new NewLineSymbol()));
	}
	
	public function test_parse_TabSymbol_ReturnTab()
	{
		$subject = new WhiteSpaceSymbolParser();
		
		self::assertEquals("\t", $subject->parse(new TabSymbol()));
	}
	
	public function test_parse_SpaceSymbol_ReturnSpace()
	{
		$subject = new WhiteSpaceSymbolParser();
		
		self::assertEquals(" ", $subject->parse(new SpaceSymbol()));
	}
	
	public function test_parse_NotWhiteSpace_ReturnNull()
	{
		$subject = new WhiteSpaceSymbolParser();
		
		self::assertNull($subject->parse(new NewSymbol()));
	}
	
	public function test_parse_NewLineSymbolAndCustom_ReturnCustom()
	{
		$subject = new WhiteSpaceSymbolParser();
		$subject->setNewLineCharacter("newLine");
		
		self::assertEquals("newLine", $subject->parse(new NewLineSymbol()));
	}
	
	public function test_parse_TabSymbolAndCustom_ReturnCustom()
	{
		$subject = new WhiteSpaceSymbolParser();
		$subject->setTabCharacter("tab");
		
		self::assertEquals("tab", $subject->parse(new TabSymbol()));
	}
}