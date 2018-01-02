<?php
namespace Novel\SanityTest;


use Novel\Tokens\Reference\NamedVariableToken;
use Novel\Tokens\Strings\DoubleQuoteStringToken;
use Novel\Tokens\Strings\HeredocToken;
use Novel\Tokens\Strings\InStringExpressionToken;
use Novel\Tokens\Strings\NowdocToken;
use Novel\Transformation\PlainTextTransformer;
use Novel\Transformation\Reference\NamedVariableTransform;
use Novel\Transformation\StringTransform;


class StringsTest extends TransformationTestCase
{
	public function test_DoubleQuoteString()
	{
		$token = new DoubleQuoteStringToken();
		
		$token->addText('Hello ');
		
		$var = new NamedVariableToken('arr');
		$inString = new InStringExpressionToken();
		$inString->setExpression($var);
		
		$token->addInStringExpression($inString);
		$token->addText(' ');
		$token->addVariableReference($var);
		
		self::assertTransformation(
			'"Hello {$arr} $arr"',
			$token,
			[
				StringTransform::class,
				PlainTextTransformer::class,
				NamedVariableTransform::class
			]
		);
	}
	
	public function test_Heredoc()
	{
		$token = new HeredocToken();
		$token->setName('TEST');
		
		$token->addText("Hello\n");
		
		$var = new NamedVariableToken('arr');
		$inString = new InStringExpressionToken();
		$inString->setExpression($var);
		
		$token->addInStringExpression($inString);
		$token->addText("\n");
		$token->addVariableReference($var);
		$token->addText("\nTest");
		
		self::assertTransformation(
			"<<<TEST\nHello\n" . '{$arr}' . "\n" . '$arr' . "\nTest\nTEST",
			$token,
			[
				StringTransform::class,
				PlainTextTransformer::class,
				NamedVariableTransform::class
			]
		);
	}
	
	public function test_InStringExpression()
	{
		$token = new InStringExpressionToken();
		$namedVar = new NamedVariableToken('Test');
		$token->setExpression($namedVar);
		
		self::assertTransformation(
			'{$Test}',
			$token,
			[
				StringTransform::class,
				PlainTextTransformer::class,
				NamedVariableTransform::class
			]
		);
	}
	
	public function test_Nowdoc()
	{
		$token = new NowdocToken();
		$token->setName('TEST');
		
		$token->addText("Hello\n");
		$token->addText("\nTest");
		
		self::assertTransformation(
			"<<<'TEST'\nHello\n\nTest\nTEST",
			$token,
			[
				StringTransform::class,
				PlainTextTransformer::class
			]
		);
	}
}