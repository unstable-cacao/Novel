<?php
namespace Novel\SanityTest;


use Novel\AccessType;
use Novel\Tokens\Consts\ConstValueToken;
use Novel\Tokens\Functions\FunctionCallToken;
use Novel\Tokens\Functions\ReturnToken;
use Novel\Tokens\Functions\GlobalFunctionToken;
use Novel\Tokens\Functions\Params\ParamDefinitionToken;

use Novel\Tokens\OOP\Methods\MethodStubToken;
use Novel\Tokens\OOP\Methods\MethodToken;
use Novel\Tokens\Reference\NamedVariableToken;


class FunctionTest extends TransformationTestCase
{
	public function test_AnonymousBasicFunction()
	{
		$token = new GlobalFunctionToken();
		
		self::assertTransformation(
			'function(){}',
			$token
		);
	}
	
	public function test_FullAnonymousFunction()
	{
		$token = new GlobalFunctionToken();
		$token->addParam(new ParamDefinitionToken('p'), new ParamDefinitionToken('i', 'int', 0, true));
		$token->addUseItem('param');
		$token->setReturnType('int');
		$token->addToBody(new ReturnToken(new ConstValueToken(1)));
		
		self::assertTransformation(
			'function($p,?int $i=0) use ($param):int{return 1;}',
			$token
		);
	}
	
	public function test_BasicGlobalFunction()
	{
		$token = new GlobalFunctionToken('test');
		
		self::assertTransformation(
			'function test(){}',
			$token
		);
	}
	
	public function test_FullGlobalFunction()
	{
		$token = new GlobalFunctionToken('test');
		$token->addParam(new ParamDefinitionToken('p'), new ParamDefinitionToken('i', 'int', 0, true));
		$token->addUseItem('param');
		$token->setReturnType('int');
		$token->addToBody(new ReturnToken(new ConstValueToken(1)));
		
		self::assertTransformation(
			'function test($p,?int $i=0) use ($param):int{return 1;}',
			$token
		);
	}
	
	public function test_BasicMethodFunction()
	{
		$token = new MethodToken('test');
		
		self::assertTransformation(
			'public function test(){}',
			$token
		);
	}
	
	public function test_BasicMethodStubFunction()
	{
		$token = new MethodStubToken('test');
		$token->setAccessibility(AccessType::PROTECTED);
		
		self::assertTransformation(
			'protected function test();',
			$token
		);
	}
	
	public function test_BasicMethodFunction_Abstract()
	{
		$token = new MethodToken('test');
		$token->setIsAbstract(true);
		
		self::assertTransformation(
			'abstract public function test(){}',
			$token
		);
	}
	
	public function test_BasicMethodFunction_Static()
	{
		$token = new MethodToken('test');
		$token->setIsStatic(true);
		
		self::assertTransformation(
			'public static function test(){}',
			$token
		);
	}
	
	public function test_BasicMethodStubFunction_Static()
	{
		$token = new MethodStubToken('test');
		$token->setIsStatic(true);
		
		self::assertTransformation(
			'public static function test();',
			$token
		);
	}
	
	public function test_BasicMethodFunction_Full()
	{
		$token = new MethodToken('test');
		$token->setIsAbstract(true);
		$token->setIsStatic(true);
		
		self::assertTransformation(
			'abstract public static function test(){}',
			$token
		);
	}
	
	public function test_FullMethodFunction()
	{
		$token = new MethodToken('test');
		$token->addParam(new ParamDefinitionToken('p'), new ParamDefinitionToken('i', 'int', 0, true));
		$token->setReturnType('int');
		$token->addToBody(new ReturnToken(new ConstValueToken(1)));
		
		self::assertTransformation(
			'public function test($p,?int $i=0):int{return 1;}',
			$token
		);
	}
	
	public function test_FullMethodStubFunction()
	{
		$token = new MethodStubToken('test');
		$token->addParam(new ParamDefinitionToken('p'), new ParamDefinitionToken('i', 'int', 0, true));
		$token->setReturnType('int');
		
		self::assertTransformation(
			'public function test($p,?int $i=0):int;',
			$token
		);
	}
	
	public function test_FullMethodFunction_Abstract()
	{
		$token = new MethodToken('test');
		$token->setIsAbstract(true);
		$token->addParam(new ParamDefinitionToken('p'), new ParamDefinitionToken('i', 'int', 0, true));
		$token->setReturnType('int');
		$token->addToBody(new ReturnToken(new ConstValueToken(1)));
		
		self::assertTransformation(
			'abstract public function test($p,?int $i=0):int{return 1;}',
			$token
		);
	}
	
	public function test_FullMethodFunction_Static()
	{
		$token = new MethodToken('test');
		$token->setIsStatic(true);
		$token->addParam(new ParamDefinitionToken('p'), new ParamDefinitionToken('i', 'int', 0, true));
		$token->setReturnType('int');
		$token->addToBody(new ReturnToken(new ConstValueToken(1)));
		
		self::assertTransformation(
			'public static function test($p,?int $i=0):int{return 1;}',
			$token
		);
	}
	
	public function test_FullMethodStubFunction_Static()
	{
		$token = new MethodStubToken('test');
		$token->setIsStatic(true);
		$token->addParam(new ParamDefinitionToken('p'), new ParamDefinitionToken('i', 'int', 0, true));
		$token->setReturnType('int');
		
		self::assertTransformation(
			'public static function test($p,?int $i=0):int;',
			$token
		);
	}
	
	public function test_FullMethodFunction_Full()
	{
		$token = new MethodToken('test');
		$token->setIsAbstract(true);
		$token->setIsStatic(true);
		$token->addParam(new ParamDefinitionToken('p'), new ParamDefinitionToken('i', 'int', 0, true));
		$token->setReturnType('int');
		$token->addToBody(new ReturnToken(new ConstValueToken(1)));
		
		self::assertTransformation(
			'abstract public static function test($p,?int $i=0):int{return 1;}',
			$token
		);
	}
	
	public function test_FunctionCall()
	{
		$token = new FunctionCallToken(new NamedVariableToken('test'));
		
		self::assertTransformation(
			'$test()',
			$token
		);
	}
	
	public function test_FunctionCallWithParams()
	{
		$token = new FunctionCallToken(new NamedVariableToken('test'));
		$token->addParameter(new NamedVariableToken('p'));
		
		self::assertTransformation(
			'$test($p)',
			$token
		);
	}
}