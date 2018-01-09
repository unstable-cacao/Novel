<?php
namespace Novel\SanityTest;


use Novel\Tokens\Scope\CodeScopeToken;
use Novel\Tokens\Scope\FileScopeToken;


class ScopeTest extends TransformationTestCase
{
	public function test_GlobalScope()
	{
		self::assertTransformation(
			"<?php\n",
			new FileScopeToken()
		);
	}
	
	public function test_CodeScope()
	{
		self::assertTransformation(
			"{}",
			new CodeScopeToken()
		);
	}
}