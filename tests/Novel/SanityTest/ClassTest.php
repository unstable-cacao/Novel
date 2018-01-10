<?php
namespace Novel\SanityTest;


use Novel\Tokens\Consts\ConstValueToken;
use Novel\Tokens\OOP\ClassToken;


class ClassTest extends TransformationTestCase
{
	public function test_BasicClass()
	{
		$token = new ClassToken();
		$token->getDeclarationToken()->setName('Test');
		
		self::assertTransformation(
			'class Test{}',
			$token
		);
	}
	
	public function test_FullClass()
	{
		$token = new ClassToken();
		$declarationToken = $token->getDeclarationToken();
		$declarationToken->setName('Test');
		$declarationToken->setIsAbstract(true);
		$declarationToken->addExtend('TestParent');
		$declarationToken->addImplement('TestInterface');
		$declarationToken->addImplement('TestInterface2');
		
		$definitionToken = $token->getDefinitionToken();
		$definitionToken->addConstValue('TEST', 1);
		$definitionToken->addPrivateMember('member', new ConstValueToken(2));
		$definitionToken->addPublicMethodStub('func');
		$definitionToken->addProtectedMethod('testFunc');
		
		self::assertTransformation(
			'abstract class Test extends TestParent implements TestInterface,TestInterface2{public const TEST=1;private $member=2;public function func();protected function testFunc(){}}',
			$token
		);
	}
}