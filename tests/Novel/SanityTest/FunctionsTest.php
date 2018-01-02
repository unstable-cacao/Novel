<?php
namespace Novel\SanityTest;


use Novel\Tokens\OOP\Accessibility\AccessibilityToken;
use Novel\Transformation\Functions\AccessibilityTransform;


class FunctionsTest extends TransformationTestCase
{
	public function test_Accessibility_private()
	{
		self::assertTransformation(
			'private',
			new AccessibilityToken('private'),
			[
				AccessibilityTransform::class
			]
		);
	}
}