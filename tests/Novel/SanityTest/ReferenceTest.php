<?php
namespace Novel\SanityTest;


use Novel\Tokens\Reference\NamedVariableToken;
use Novel\Tokens\Reference\SelfKeywordToken;
use Novel\Tokens\Reference\ThisVariableToken;


class ReferenceTest extends TransformationTestCase
{
	public function test_NamedVariable()
	{
		$token = new NamedVariableToken('var');
		
		self::assertTransformation(
			'$var',
			$token
		);
	}
	
	public function test_ThisVariable()
	{
		$token = new ThisVariableToken();
		
		self::assertTransformation(
			'$this',
			$token
		);
	}
	
	public function test_Self()
	{
		$token = new SelfKeywordToken();
		
		self::assertTransformation(
			'self',
			$token
		);
	}
}