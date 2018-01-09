<?php
namespace Novel\SanityTest;


use Novel\Tokens\Comments\MultiLineCommentToken;
use Novel\Tokens\Comments\OneLineCommentToken;


class CommentsTest extends TransformationTestCase
{
	public function test_OneLine()
	{
		self::assertTransformation(
			'//abc',
			new OneLineCommentToken('abc')
		);
	}
	
	public function test_MultiLine()
	{
		self::assertTransformation(
			'/*abc*/',
			new MultiLineCommentToken('abc')
		);
	}
}