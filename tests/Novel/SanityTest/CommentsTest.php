<?php
namespace Novel\SanityTest;


use Novel\Tokens\Comments\MultiLineCommentToken;
use Novel\Tokens\Comments\OneLineCommentToken;

use Novel\Transformation\Comments\MultiLineCommentTransform;
use Novel\Transformation\PlainTextTransformer;
use Novel\Transformation\Comments\OneLineCommentTransform;


class CommentsTest extends TransformationTestCase
{
	public function test_OneLine()
	{
		self::assertTransformation(
			'//abc',
			new OneLineCommentToken('abc'),
			[
				PlainTextTransformer::class,
				OneLineCommentTransform::class
			]
		);
	}
	
	public function test_MultiLine()
	{
		self::assertTransformation(
			'/*abc*/',
			new MultiLineCommentToken('abc'),
			[
				PlainTextTransformer::class,
				MultiLineCommentTransform::class
			]
		);
	}
}