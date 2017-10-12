<?php
namespace Novel;


use Novel\Core\ISymbol;
use Novel\Core\IToken;
use Novel\Core\Stream\ISymbolWriteStream;
use Novel\Core\Transforming\ITokenChainTransform;
use Novel\Core\Transforming\ITokenMiddlewareTransform;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\WhiteSpace\SpaceSymbol;
use PHPUnit\Framework\TestCase;


class TokenTransformerTest extends TestCase
{
	private function mockToken(): IToken
	{
		$mock = $this->getMockBuilder(IToken::class)->getMock();
		
		/** @noinspection PhpIncompatibleReturnTypeInspection */
		return $mock;
	}
	
	private function mockMainTransform(ISymbol $symbol): ITokenTransform
	{
		$mock = $this->getMockBuilder(ITokenTransform::class)->getMock();
		$mock->method('transform')->willReturn([$symbol]);
		
		/** @noinspection PhpIncompatibleReturnTypeInspection */
		return $mock;
	}
	
	private function mockPreTransform(ISymbol $symbol): ITokenChainTransform
	{
		$mock = $this->getMockBuilder(ITokenChainTransform::class)->getMock();
		$mock->method('preTransform')->willReturn([$symbol]);
		
		/** @noinspection PhpIncompatibleReturnTypeInspection */
		return $mock;
	}
	
	private function mockPostTransform(ISymbol $symbol): ITokenChainTransform
	{
		$mock = $this->getMockBuilder(ITokenChainTransform::class)->getMock();
		$mock->method('postTransform')->willReturn([$symbol]);
		
		/** @noinspection PhpIncompatibleReturnTypeInspection */
		return $mock;
	}
	
	
	public function test_transform_HasPreTransform()
	{
		$subject = new TransformMediator();
		$mainSymbol = new SpaceSymbol();
		$preSymbol = new SpaceSymbol();
		$subject->getSetup()->add([
			$this->mockMainTransform($mainSymbol), 
			$this->mockPreTransform($preSymbol)
		]);
		
		self::assertEquals([$preSymbol, $mainSymbol], $subject->transform($this->mockToken()));
	}
	
	public function test_transform_HasPostTransform()
	{
		$subject = new TransformMediator();
		$mainSymbol = new SpaceSymbol();
		$postSymbol = new SpaceSymbol();
		$subject->getSetup()->add([
			$this->mockMainTransform($mainSymbol), 
			$this->mockPostTransform($postSymbol)
		]);
		
		self::assertEquals([$mainSymbol, $postSymbol], $subject->transform($this->mockToken()));
	}
	
	public function test_transform_HasMiddleware_MiddlewareExecuted()
	{
		$subject = new TransformMediator();
		$mainSymbol = new SpaceSymbol();
		$called = false;
		
		$middleware = $this->getMockBuilder(ITokenMiddlewareTransform::class)->getMock();
		$middleware->method('executeTransform')->will($this->returnCallback(
			function () use (&$called)
			{
				$called = true;
			}
		));
		
		$subject->getSetup()->add([
			$this->mockMainTransform($mainSymbol), 
			$middleware
		]);
		
		$subject->transform($this->mockToken());
		
		self::assertTrue($called);
	}
	
	public function test_transform_HasTwoMiddlewares_FirstMiddlewareCalledBySecond()
	{
		$subject = new TransformMediator();
		$called = false;
		
		$middleware = $this->getMockBuilder(ITokenMiddlewareTransform::class)->getMock();
		$middleware->method('executeTransform')->will($this->returnCallback(
			function () use (&$called)
			{
				$called = true;
			}
		));
		
		$middleware2 = $this->getMockBuilder(ITokenMiddlewareTransform::class)->getMock();
		$middleware2->method('executeTransform')->will($this->returnCallback(
			function (IToken $token, ISymbolWriteStream $writer, callable $next)
			{
				$next();
			}
		));
		
		$subject->getSetup()->add([
			$this->mockMainTransform(new SpaceSymbol()), 
			$middleware,
			$middleware2
		]);
		
		$subject->transform($this->mockToken());
		
		self::assertTrue($called);
	}
}