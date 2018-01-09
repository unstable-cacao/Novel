<?php
namespace Novel\SanityTest;


use Novel\Tokens\Reference\NamedVariableToken;


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
}