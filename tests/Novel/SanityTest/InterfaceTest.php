<?php
namespace Novel\SanityTest;


use Novel\Tokens\OOP\InterfaceToken;


class InterfaceTest extends TransformationTestCase
{
	public function test_BasicInterface()
	{
		$token = new InterfaceToken();
		$token->getDeclarationToken()->setName('Test');
		
		self::assertTransformation(
			'interface Test{}',
			$token
		);
	}
	
	public function test_FullInterface()
	{
		$token = new InterfaceToken();
		$declarationToken = $token->getDeclarationToken();
		$declarationToken->setName('Test');
		$declarationToken->addExtend('TestParent');
		$definitionToken = $token->getDefinitionToken();
		$definitionToken->addConstValue('TEST', 1);
		$definitionToken->addPublicMethodStub('func');
		
		self::assertTransformation(
			'interface Test extends TestParent{public const TEST=1;public function func();}',
			$token
		);
	}
}