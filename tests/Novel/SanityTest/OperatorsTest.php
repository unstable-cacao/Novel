<?php
namespace Novel\SanityTest;


use Novel\Tokens\Functions\FunctionCallToken;
use Novel\Tokens\Named\NameToken;
use Novel\Tokens\Reference\NamedVariableToken;
use Novel\Tokens\ScopeReference\InstanceScopeReferenceToken;
use Novel\Tokens\ScopeReference\StaticScopeReferenceToken;


class OperatorsTest extends TransformationTestCase
{
	public function test_StaticReference()
	{
		$token = new StaticScopeReferenceToken();
		$token->set(new NamedVariableToken('test'), new FunctionCallToken(new NameToken('func')));
		
		self::assertTransformation(
			'$test::func()',
			$token
		);
	}
	
	public function test_InstanceReference()
	{
		$token = new InstanceScopeReferenceToken();
		$token->set(new NamedVariableToken('test'), new FunctionCallToken(new NameToken('func')));
		
		self::assertTransformation(
			'$test->func()',
			$token
		);
	}
}