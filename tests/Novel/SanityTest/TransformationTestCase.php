<?php
namespace Novel\SanityTest;


use Novel\Novel;
use Novel\Core\IToken;
use Novel\Setup\StandardClasses;
use Novel\Transformation\Utils\StatementNewLineMiddlewareTransform;
use PHPUnit\Framework\TestCase;


class TransformationTestCase extends TestCase
{
	public static function assertTransformation(string $expected, IToken $root, $setup = []): void
	{
		if (!is_array($setup))
			$setup = [$setup];
		
		$novel = new Novel();
		
		$config = $novel->getConfig();
		$config->add(array_unique(
			array_merge(
				$setup,
				StandardClasses::TRANSFORMERS,
				StandardClasses::PARSERS
			)
		));
		$config->TransferConfig->add(StatementNewLineMiddlewareTransform::class);
		
		$result = $novel->stringify($root);
		
		self::assertEquals(
			$expected,
			$result
		);
	}
}