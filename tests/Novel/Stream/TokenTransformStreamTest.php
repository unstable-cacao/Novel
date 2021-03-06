<?php
namespace Novel\Stream;


use Novel\Core\IToken;
use Novel\Core\ISymbol;
use Novel\Core\ITransformMediator;
use PHPUnit\Framework\TestCase;


class TokenTransformStreamTest extends TestCase
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

	private function subject(): TokenTransformStream
	{
		return new TokenTransformStream($this->mockMain());
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
		$subject = new TokenTransformStream($main);
		
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
		
		$subject = new TokenTransformStream($main);
		
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