<?php
namespace Novel\SanityTest;


use Novel\Tokens\Consts\ConstValueToken;


class ConstValueTest extends TransformationTestCase
{
	public function test_ConstValueToken_bool()
	{
		self::assertTransformation(
			"true",
			new ConstValueToken(true)
		);
	}
	
	public function test_ConstValueToken_null()
	{
		self::assertTransformation(
			"null",
			new ConstValueToken(null)
		);
	}
	
	public function test_ConstValueToken_string()
	{
		self::assertTransformation(
			"'Test'",
			new ConstValueToken('Test')
		);
	}
	
	public function test_ConstValueToken_int()
	{
		self::assertTransformation(
			"15",
			new ConstValueToken(15)
		);
	}
}