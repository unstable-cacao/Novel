<?php
namespace Novel\Parsing;


use Novel\Idents\Keyword\NewIdent;
use Novel\Idents\WhiteSpace\NewLineIdent;
use Novel\Idents\WhiteSpace\SpaceIdent;
use Novel\Idents\WhiteSpace\TabIdent;
use PHPUnit\Framework\TestCase;


class WhiteSpaceIdentParserTest extends TestCase
{
	public function test_ReturnSelf()
	{
		$subject = new WhiteSpaceIdentParser();
		
		self::assertEquals($subject, $subject->setNewLineCharacter("\n"));
		self::assertEquals($subject, $subject->setTabCharacter("\t"));
	}
	
	public function test_parse_NewLineIdent_ReturnNewLine()
	{
		$subject = new WhiteSpaceIdentParser();
		
		self::assertEquals(PHP_EOL, $subject->parse(new NewLineIdent()));
	}
	
	public function test_parse_TabIdent_ReturnTab()
	{
		$subject = new WhiteSpaceIdentParser();
		
		self::assertEquals("\t", $subject->parse(new TabIdent()));
	}
	
	public function test_parse_SpaceIdent_ReturnSpace()
	{
		$subject = new WhiteSpaceIdentParser();
		
		self::assertEquals(" ", $subject->parse(new SpaceIdent()));
	}
	
	public function test_parse_NotWhiteSpace_ReturnNull()
	{
		$subject = new WhiteSpaceIdentParser();
		
		self::assertNull($subject->parse(new NewIdent()));
	}
	
	public function test_parse_NewLineIdentAndCustom_ReturnCustom()
	{
		$subject = new WhiteSpaceIdentParser();
		$subject->setNewLineCharacter("newLine");
		
		self::assertEquals("newLine", $subject->parse(new NewLineIdent()));
	}
	
	public function test_parse_TabIdentAndCustom_ReturnCustom()
	{
		$subject = new WhiteSpaceIdentParser();
		$subject->setTabCharacter("tab");
		
		self::assertEquals("tab", $subject->parse(new TabIdent()));
	}
}