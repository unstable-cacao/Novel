<?php
namespace Novel\SanityTest;


use Novel\Tokens\GlobalScopeToken;
use Novel\Transformation\ConstValueTokenTransform;
use Novel\Transformation\Scope\GlobalScopeTokenTransform;


class ScopeTest extends TransformationTestCase
{
	public function test_GlobalScope()
	{
		self::assertTransformation(
			"<?php\n",
			new GlobalScopeToken(),
			[
				GlobalScopeTokenTransform::class
			]
		);
	}
}