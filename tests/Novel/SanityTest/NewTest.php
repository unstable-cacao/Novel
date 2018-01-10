<?php
namespace Novel\SanityTest;


use Novel\Tokens\Consts\ConstValueToken;
use Novel\Tokens\OOP\NewToken;
use Novel\Tokens\Reference\NamedVariableToken;


class NewTest extends TransformationTestCase
{
	public function test_NewBasic()
	{
		$token = new NewToken('Object');
		
		self::assertTransformation(
			'new Object()',
			$token
		);
	}
	
	public function test_FullNew()
	{
		$token = new NewToken('Object');
		$token->addParameter(new NamedVariableToken('p'), new ConstValueToken(true));
		
		self::assertTransformation(
			'new Object($p,true)',
			$token
		);
	}
}