<?php
namespace Novel\SanityTest;


use Novel\Tokens\Scope\CodeScopeToken;
use Novel\Tokens\Scope\FileScopeToken;
use Novel\Transformation\ConstValueTokenTransform;
use Novel\Transformation\Scope\CodeScopeTokenTransform;
use Novel\Transformation\Scope\GlobalScopeTokenTransform;


class ScopeTest extends TransformationTestCase
{
	public function test_GlobalScope()
	{
		self::assertTransformation(
			"<?php\n",
			new FileScopeToken(),
			[
				GlobalScopeTokenTransform::class
			]
		);
	}
	
	public function test_CodeScope()
	{
		self::assertTransformation(
			"{}",
			new CodeScopeToken(),
			[
				CodeScopeTokenTransform::class
			]
		);
	}
}