<?php
namespace Novel\SanityTest;


use Novel\Tokens\Reference\NamedVariableToken;
use Novel\Transformation\Reference\NamedVariableTransform;


class ReferenceTest extends TransformationTestCase
{
	public function test_NamedVariable()
	{
		$token = new NamedVariableToken('var');
		
		self::assertTransformation(
			'$var',
			$token,
			[
				NamedVariableTransform::class,
			]
		);
	}
}