<?php
namespace Novel\SanityTest;


use Novel\Tokens\Arrays\ArrayAccessToken;
use Novel\Tokens\Arrays\ArrayDefinitionToken;
use Novel\Tokens\Arrays\ArrayUnwrapToken;
use Novel\Tokens\Arrays\KeyValueToken;
use Novel\Tokens\Arrays\PushElementOperation;
use Novel\Tokens\ConstValueToken;
use Novel\Tokens\NameToken;
use Novel\Transformation\Arrays\ArrayAccessTransform;
use Novel\Transformation\Arrays\ArrayDefinitionTransform;
use Novel\Transformation\Arrays\ArrayPushElementOperationTransform;
use Novel\Transformation\Arrays\ArrayUnwrapTransform;
use Novel\Transformation\Arrays\SimpleKeyValueTransform;
use Novel\Transformation\ConstValueTokenTransform;


class ArraysTest extends TransformationTestCase
{
	public function test_ArrayAccess()
	{
		$token = new ArrayAccessToken('');
		$token->setTarget(new NameToken('$arr'));
		$token->setKey(new ConstValueToken(0));
		
		self::assertTransformation(
			'$arr[0]',
			$token,
			[
				ArrayAccessTransform::class,
				ConstValueTokenTransform::class
			]
		);
	}
	
	public function test_ArrayDefinition()
	{
		$token = new ArrayDefinitionToken('');
		$token->addItems([1, 2, 3, 4]);
		
		self::assertTransformation(
			'[1,2,3,4]',
			$token,
			[
				ArrayDefinitionTransform::class,
				ConstValueTokenTransform::class
			]
		);
	}
	
	public function test_ArrayPushElementOperation()
	{
		$token = new PushElementOperation('');
		$token->setTarget(new NameToken('$arr'));
		$token->setValue(new ConstValueToken(15));
		
		self::assertTransformation(
			'$arr[]=15',
			$token,
			[
				ArrayPushElementOperationTransform::class,
				ConstValueTokenTransform::class
			]
		);
	}
	
	public function test_ArrayUnwrap()
	{
		$token = new ArrayUnwrapToken('');
		$token->setTarget(new NameToken('$arr'));
		
		self::assertTransformation(
			'...$arr',
			$token,
			[
				ArrayUnwrapTransform::class
			]
		);
	}
	
	public function test_SimpleKeyValue()
	{
		$token = new KeyValueToken('');
		$token->setKey('Test');
		$token->setValue('Five');
		
		self::assertTransformation(
			"\'Test\'=>\'Five\'",
			$token,
			[
				SimpleKeyValueTransform::class,
				ConstValueTokenTransform::class
			]
		);
	}
}