<?php
namespace Novel\SanityTest;


use Novel\Tokens\ConstValueToken;
use Novel\Transformation\ConstValueTokenTransform;


class ConstValueTest extends TransformationTestCase
{
	public function test_ConstValueToken_bool()
	{
		self::assertTransformation(
			"true",
			new ConstValueToken(true),
			[
				ConstValueTokenTransform::class
			]
		);
	}
	
	public function test_ConstValueToken_null()
	{
		self::assertTransformation(
			"null",
			new ConstValueToken(null),
			[
				ConstValueTokenTransform::class
			]
		);
	}
	
	public function test_ConstValueToken_string()
	{
		self::assertTransformation(
			"\'Test\'",
			new ConstValueToken('Test'),
			[
				ConstValueTokenTransform::class
			]
		);
	}
	
	public function test_ConstValueToken_int()
	{
		self::assertTransformation(
			"15",
			new ConstValueToken(15),
			[
				ConstValueTokenTransform::class
			]
		);
	}
}