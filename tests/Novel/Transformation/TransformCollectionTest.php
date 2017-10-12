<?php
namespace Novel\Transformation;


use Novel\Core\IToken;
use Novel\Core\Transforming\ITokenChainTransform;
use Novel\Core\Transforming\ITokenMiddlewareTransform;
use Novel\Core\Transforming\ITokenTransformer;
use Novel\Tokens\Operators\AdditionToken;
use PHPUnit\Framework\TestCase;


class TransformCollectionTest extends TestCase
{
	private function mockToken(): IToken
	{
		/** @noinspection PhpIncompatibleReturnTypeInspection */
		return $this->getMockBuilder(IToken::class)->getMock();
	}
	
	private function mockTransformer(): ITokenTransformer
	{
		/** @noinspection PhpIncompatibleReturnTypeInspection */
		return $this->getMockBuilder(ITokenTransformer::class)->getMock();
	}
	
	private function mockMiddlewareTransformer(): ITokenMiddlewareTransform
	{
		/** @noinspection PhpIncompatibleReturnTypeInspection */
		return $this->getMockBuilder(ITokenMiddlewareTransform::class)->getMock();
	}
	
	private function mockChainTransformer(): ITokenChainTransform
	{
		/** @noinspection PhpIncompatibleReturnTypeInspection */
		return $this->getMockBuilder(ITokenChainTransform::class)->getMock();
	}
	
	
	public function test_ReturnSelf()
	{
		$transformer = $this->mockTransformer();
		
		$subject = new TransformCollection();
		
		self::assertEquals($subject, $subject->add($transformer));
		self::assertEquals($subject, $subject->addByType('TestType', $transformer));
	}
	
	
	public function test_getMainFor_Empty_ReturnEmpty()
	{
		$subject = new TransformCollection();
		
		self::assertEquals([], $subject->getMainFor($this->mockToken()));
	}
	
	public function test_getMainFor_HasByType_ReturnByType()
	{
		$token = $this->mockToken();
		$transformer = $this->mockTransformer();
		
		$subject = new TransformCollection();
		$subject->addByType(get_class($token), $transformer);
		
		self::assertEquals([$transformer], $subject->getMainFor($token));
	}
	
	public function test_getMainFor_HasTransformers_ReturnTransformers()
	{
		$token = $this->mockToken();
		$transformer = $this->mockTransformer();
		
		$subject = new TransformCollection();
		$subject->add($transformer);
		
		self::assertEquals([$transformer], $subject->getMainFor($token));
	}
	
	public function test_getMainFor_HasByTypeAndTransformers_ReturnAll()
	{
		$token = $this->mockToken();
		$transformer = $this->mockTransformer();
		$transformer2 = $this->mockTransformer();
		
		$subject = new TransformCollection();
		$subject->add($transformer);
		$subject->addByType(get_class($token), $transformer2);
		
		self::assertEquals([$transformer2, $transformer], $subject->getMainFor($token));
	}
	
	public function test_getMiddlewareFor_Empty_ReturnEmpty()
	{
		$token = $this->mockToken();
		
		$subject = new TransformCollection();
		
		self::assertEquals([], $subject->getMiddlewareFor($token));
	}
	
	public function test_getMiddlewareFor_HasByType_ReturnByType()
	{
		$token = $this->mockToken();
		$transformer = $this->mockMiddlewareTransformer();
		
		$subject = new TransformCollection();
		$subject->addByType(get_class($token), $transformer);
		
		self::assertEquals([$transformer], $subject->getMiddlewareFor($token));
	}
	
	public function test_getMiddlewareFor_HasParsers_ReturnParsers()
	{
		$token = $this->mockToken();
		$transformer = $this->mockMiddlewareTransformer();
		
		$subject = new TransformCollection();
		$subject->add($transformer);
		
		self::assertEquals([$transformer], $subject->getMiddlewareFor($token));
	}
	
	public function test_getMiddlewareFor_HasByTypeAndParsers_ReturnAll()
	{
		$token = $this->mockToken();
		$transformer = $this->mockMiddlewareTransformer();
		$transformer2 = $this->mockMiddlewareTransformer();
		
		$subject = new TransformCollection();
		$subject->add($transformer);
		$subject->addByType(get_class($token), $transformer2);
		
		self::assertEquals([$transformer2, $transformer], $subject->getMiddlewareFor($token));
	}
	
	public function test_getChainFor_Empty_ReturnEmpty()
	{
		$token = $this->mockToken();
		
		$subject = new TransformCollection();
		
		self::assertEquals([], $subject->getChainFor($token));
	}
	
	public function test_getChainFor_HasByType_ReturnByType()
	{
		$token = $this->mockToken();
		$transformer = $this->mockChainTransformer();
		
		$subject = new TransformCollection();
		$subject->addByType(get_class($token), $transformer);
		
		self::assertEquals([$transformer], $subject->getChainFor($token));
	}
	
	public function test_getChainFor_HasParsers_ReturnParsers()
	{
		$token = $this->mockToken();
		$transformer = $this->mockChainTransformer();
		
		$subject = new TransformCollection();
		$subject->add($transformer);
		
		self::assertEquals([$transformer], $subject->getChainFor($token));
	}
	
	public function test_getChainFor_HasByTypeAndParsers_ReturnAll()
	{
		$token = $this->mockToken();
		$transformer = $this->mockChainTransformer();
		$transformer2 = $this->mockChainTransformer();
		
		$subject = new TransformCollection();
		$subject->add($transformer);
		$subject->addByType(get_class($token), $transformer2);
		
		self::assertEquals([$transformer2, $transformer], $subject->getChainFor($token));
	}
	
	
	public function test_add_Transform_AddsToTransforms()
	{
		$token = $this->mockToken();
		$transformer = $this->mockTransformer();
		
		$subject = new TransformCollection();
		$subject->add($transformer);
		
		self::assertEquals([$transformer], $subject->getMainFor($token));
	}
	
	public function test_add_Middleware_AddsToMiddlewares()
	{
		$token = $this->mockToken();
		$transformer = $this->mockMiddlewareTransformer();
		
		$subject = new TransformCollection();
		$subject->add($transformer);
		
		self::assertEquals([$transformer], $subject->getMiddlewareFor($token));
	}
	
	public function test_add_Chain_AddsToChains()
	{
		$token = $this->mockToken();
		$transformer = $this->mockChainTransformer();
		
		$subject = new TransformCollection();
		$subject->add($transformer);
		
		self::assertEquals([$transformer], $subject->getChainFor($token));
	}
	
	public function test_add_SeveralTransforms_AddsAll()
	{
		$token = $this->mockToken();
		$transformer = $this->mockTransformer();
		$transformer2 = $this->mockMiddlewareTransformer();
		
		$subject = new TransformCollection();
		$subject->add([$transformer, $transformer2]);
		
		self::assertEquals([$transformer], $subject->getMainFor($token));
		self::assertEquals([$transformer2], $subject->getMiddlewareFor($token));
	}
	
	public function test_addByType_Transform_AddsToTransforms()
	{
		$token = $this->mockToken();
		$transformer = $this->mockTransformer();
		
		$subject = new TransformCollection();
		$subject->addByType(get_class($token), $transformer);
		
		self::assertEquals([$transformer], $subject->getMainFor($token));
	}
	
	public function test_addByType_Middleware_AddsToMiddlewares()
	{
		$token = $this->mockToken();
		$transformer = $this->mockMiddlewareTransformer();
		
		$subject = new TransformCollection();
		$subject->addByType(get_class($token), $transformer);
		
		self::assertEquals([$transformer], $subject->getMiddlewareFor($token));
	}
	
	public function test_addByType_Chain_AddsToChains()
	{
		$token = $this->mockToken();
		$transformer = $this->mockChainTransformer();
		
		$subject = new TransformCollection();
		$subject->addByType(get_class($token), $transformer);
		
		self::assertEquals([$transformer], $subject->getChainFor($token));
	}
	
	public function test_addByType_TwoTypesOneTransform_AddsToBoth()
	{
		$token = $this->mockToken();
		$token2 = new AdditionToken();
		$transformer = $this->mockTransformer();
		
		$subject = new TransformCollection();
		$subject->addByType([get_class($token), get_class($token2)], $transformer);
		
		self::assertEquals([$transformer], $subject->getMainFor($token));
		self::assertEquals([$transformer], $subject->getMainFor($token2));
	}
	
	public function test_addByType_OneTypeTwoParsers_AddsBothToType()
	{
		$token = $this->mockToken();
		$transformer = $this->mockTransformer();
		$transformer2 = $this->mockTransformer();
		
		$subject = new TransformCollection();
		$subject->addByType(get_class($token), [$transformer, $transformer2]);
		
		self::assertEquals([$transformer, $transformer2], $subject->getMainFor($token));
	}
	
	public function test_addByType_TwoTypesTwoParsers_AddsToAllTypesAllParsers()
	{
		$token = $this->mockToken();
		$token2 = new AdditionToken();
		$transformer = $this->mockTransformer();
		$transformer2 = $this->mockTransformer();
		
		$subject = new TransformCollection();
		$subject->addByType([get_class($token), get_class($token2)], [$transformer, $transformer2]);
		
		self::assertEquals([$transformer, $transformer2], $subject->getMainFor($token));
		self::assertEquals([$transformer, $transformer2], $subject->getMainFor($token2));
	}
}