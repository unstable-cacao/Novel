<?php
namespace Novel\SanityTest;


use Novel\Tokens\OOP\TraitToken;


class TraitTest extends TransformationTestCase
{
	public function test_BasicTrait()
	{
		$token = new TraitToken();
		$token->getDeclarationToken()->setName('Test');
		
		self::assertTransformation(
			'trait Test{}',
			$token
		);
	}
	
	public function test_FullTrait()
	{
		$token = new TraitToken();
		$declarationToken = $token->getDeclarationToken();
		$declarationToken->setName('Test');
		$definitionToken = $token->getDefinitionToken();
		$definitionToken->addConstValue('TEST', 1);
		$definitionToken->addPrivateMember('member');
		$definitionToken->addPublicMethodStub('func');
		$definitionToken->addProtectedMethod('testFunc');
		
		self::assertTransformation(
			'trait Test{public const TEST=1;private $member;public function func();protected function testFunc(){}}',
			$token
		);
	}
}