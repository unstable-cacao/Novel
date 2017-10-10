<?php
namespace Novel\Stream;


use Novel\Core\ISymbol;
use PHPUnit\Framework\TestCase;


class SymbolWriteStreamTest extends TestCase
{
	private function mockSymbol(): ISymbol
	{
		/** @noinspection PhpIncompatibleReturnTypeInspection */
		return $this->getMockBuilder(ISymbol::class)->getMock();
	}
	
	
	public function test_push_ReturnSelf()
	{
		$subject = new SymbolWriteStream();
		self::assertSame($subject, $subject->push($this->mockSymbol()));
	}
	
	public function test_push_SingleItem_ItemAdded()
	{
		$subject = new SymbolWriteStream();
		
		$symbol1 = $this->mockSymbol();
		$symbol2 = $this->mockSymbol();
		
		$subject->push($symbol1);
		$subject->push($symbol2);
		
		self::assertEquals(
			[
				$symbol1,
				$symbol2
			],
			$subject->getSymbols()
		);
	}
	
	public function test_push_ArrayOfItems_ItemAdded()
	{
		$subject = new SymbolWriteStream();
		
		$symbol1 = $this->mockSymbol();
		$symbol2 = $this->mockSymbol();
		$symbol3 = $this->mockSymbol();
		$symbol4 = $this->mockSymbol();
		
		$subject->push([$symbol1, $symbol2]);
		$subject->push([$symbol3, $symbol4]);
		
		self::assertEquals(
			[
				$symbol1,
				$symbol2,
				$symbol3,
				$symbol4
			],
			$subject->getSymbols()
		);
	}
	
	public function test_getSymbols_None_ReturnEmptyAray()
	{
		$subject = new SymbolWriteStream();
		self::assertEmpty($subject->getSymbols());
	}
	
	public function test_getSymbols_HasItems_ItemsReturned()
	{
		$subject = new SymbolWriteStream();
		
		$symbol1 = $this->mockSymbol();
		$symbol2 = $this->mockSymbol();
		
		$subject->push([$symbol1, $symbol2]);
		
		self::assertEquals([$symbol1, $symbol2], $subject->getSymbols());
	}
}