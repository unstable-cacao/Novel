<?php
namespace Novel\SanityTest;


use Novel\Tokens\Strings\PlainTextToken;
use Novel\Transformation\PlainTextTransformer;


class PlainTextTest extends TransformationTestCase
{
	public function test_PlainText()
	{
		self::assertTransformation(
			"Test test test",
			new PlainTextToken("Test test test"),
			[
				PlainTextTransformer::class
			]
		);
	}
}