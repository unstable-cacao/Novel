<?php
namespace Novel\Stream;


use Novel\Core\ISymbol;
use Novel\Core\ITransformMediator;
use Novel\Core\IToken;
use PHPUnit\Framework\TestCase;


class TransformStreamTest extends TestCase
{
	private function mockSymbol(): ISymbol
	{
		/** @noinspection PhpIncompatibleReturnTypeInspection */
		return $this->getMockBuilder(ISymbol::class)->getMock();
	}
	
	/**
	 * @return IToken|\PHPUnit_Framework_MockObject_MockObject
	 */
	private function mockToken(): IToken
	{
		/** @noinspection PhpIncompatibleReturnTypeInspection */
		return $this->getMockBuilder(IToken::class)->getMock();
	}

	/**
	 * @return ITransformMediator|\PHPUnit_Framework_MockObject_MockObject
	 */
	private function mockMain(): ITransformMediator
	{
		/** @noinspection PhpIncompatibleReturnTypeInspection */
		return $this->getMockBuilder(ITransformMediator::class)->getMock();
	}

	private function subject(): TransformStream
	{
		return new TransformStream($this->mockMain());
	}
	
	
	public function test_validateClear_clear_NoExceptionThrown()
	{
		$this->subject()->validateClear();
		
		self::assertTrue(true);
	}

	/**
	 * @expectedException \Exception
	 */
	public function test_validateClear_StreamIsNotEmpty_ExceptionThrown()
	{
		$subject = $this->subject();
		$subject->push($this->mockSymbol());
		$subject->validateClear();
	}
    
	
	public function test_result_HasSymbols_ReturnSymbols()
	{
		$subject = $this->subject();
		
		$symbol1 = $this->mockSymbol();
		$symbol2 = $this->mockSymbol();
		
		$subject->push([$symbol1, $symbol2]);
		
		self::assertEquals(
			[
				$symbol1,
				$symbol2
			],
			$subject->getSymbols()
		);
	}
	
	public function test_transformChildren_ReturnSelf()
	{
		$token = $this->mockToken();
		$subject = $this->subject();
		
		$token->method('children')->willReturn([]);
		
		self::assertEquals([], $subject->transformChildren($token));
	}
	
	public function test_transformChildren_NoChildren_MainTransformNotInvoked()
	{
		$main = $this->mockMain();
		$token = $this->mockToken();
		$subject = new TransformStream($main);
		
		$token->method('children')->willReturn([]);
		
		$main->expects($this->never())
			->method('transform');
		
		$subject->transformChildren($token);
	}
	
	public function test_transformChildren_HasChildren_MainTransformInvokedForEachChild()
	{
		$main = $this->mockMain();
		$token = $this->mockToken();
		$child1 = $this->mockToken();
		$child2 = $this->mockToken();
		
		$subject = new TransformStream($main);
		
		$token->method('children')->willReturn([$child1, $child2]);
		
		$main->expects($this->at(0))
			->method('transform')
			->with($child1);
		
		$main->expects($this->at(1))
			->method('transform')
			->with($child2);
		
		$subject->transformChildren($token);
	}
}