<?php
namespace Novel\Stream;


use Novel\Core\IIdent;
use PHPUnit\Framework\TestCase;


class IdentWriteStreamTest extends TestCase
{
	private function mockIdent(): IIdent
	{
		/** @noinspection PhpIncompatibleReturnTypeInspection */
		return $this->getMockBuilder(IIdent::class)->getMock();
	}
	
	
	public function test_push_ReturnSelf()
	{
		$subject = new IdentWriteStream();
		self::assertSame($subject, $subject->push($this->mockIdent()));
	}
	
	public function test_push_SingleItem_ItemAdded()
	{
		$subject = new IdentWriteStream();
		
		$ident1 = $this->mockIdent();
		$ident2 = $this->mockIdent();
		
		$subject->push($ident1);
		$subject->push($ident2);
		
		self::assertEquals(
			[
				$ident1,
				$ident2
			],
			$subject->getIdents()
		);
	}
	
	public function test_push_ArrayOfItems_ItemAdded()
	{
		$subject = new IdentWriteStream();
		
		$ident1 = $this->mockIdent();
		$ident2 = $this->mockIdent();
		$ident3 = $this->mockIdent();
		$ident4 = $this->mockIdent();
		
		$subject->push([$ident1, $ident2]);
		$subject->push([$ident3, $ident4]);
		
		self::assertEquals(
			[
				$ident1,
				$ident2,
				$ident3,
				$ident4
			],
			$subject->getIdents()
		);
	}
	
	public function test_getIdents_None_ReturnEmptyAray()
	{
		$subject = new IdentWriteStream();
		self::assertEmpty($subject->getIdents());
	}
	
	public function test_getIdents_HasItems_ItemsReturned()
	{
		$subject = new IdentWriteStream();
		
		$ident1 = $this->mockIdent();
		$ident2 = $this->mockIdent();
		
		$subject->push([$ident1, $ident2]);
		
		self::assertEquals([$ident1, $ident2], $subject->getIdents());
	}
}