<?php
namespace Novel\Parsing;


use Novel\Idents\ConstStringIdent;
use Novel\Idents\Keyword\NewIdent;
use PHPUnit\Framework\TestCase;


class SingleStringIdentParserTest extends TestCase
{
	public function test_parse_InstanceOfAbstractSingleStringIdent_ReturnIdentString()
	{
		$subject = new SingleStringIdentParser();
		$ident = new NewIdent();
		
		self::assertEquals("new", $subject->parse($ident));
	}
	
	public function test_parse_NotInstanceOfAbstractSingleStringIdent_ReturnNull()
	{
		$subject = new SingleStringIdentParser();
		$ident = new ConstStringIdent();
		
		self::assertNull($subject->parse($ident));
	}
}