<?php
namespace Novel\SanityTest;


use Novel\Tokens\Consts\ConstValueToken;
use Novel\Tokens\Functions\GlobalFunctionToken;
use Novel\Tokens\Functions\Params\ParamDefinitionToken;
use Novel\Tokens\Functions\ReturnStatementToken;
use Novel\Transformation\ConstValueTokenTransform;
use Novel\Transformation\Functions\FunctionTransform;
use Novel\Transformation\Functions\ParamDefinitionTransform;
use Novel\Transformation\Functions\ParamListDefinitionTransform;
use Novel\Transformation\Functions\ReturnStatementTokenTransform;
use Novel\Transformation\Functions\UseItemTokenTransform;
use Novel\Transformation\Functions\UseScopeTransform;
use Novel\Transformation\NameTokenTransform;
use Novel\Transformation\Scope\CodeScopeTokenTransform;


class FunctionTest extends TransformationTestCase
{
	public function test_AnonymousBasicFunction()
	{
		$token = new GlobalFunctionToken();
		
		self::assertTransformation(
			'function(){}',
			$token,
			[
				FunctionTransform::class,
				CodeScopeTokenTransform::class,
				ParamListDefinitionTransform::class,
				ParamDefinitionTransform::class,
				NameTokenTransform::class,
				ConstValueTokenTransform::class,
				ReturnStatementTokenTransform::class,
				UseScopeTransform::class,
				UseItemTokenTransform::class
			]
		);
	}
	
	public function test_FullAnonymousFunction()
	{
		$token = new GlobalFunctionToken();
		$token->addParam(new ParamDefinitionToken('p'), new ParamDefinitionToken('i', 'int', 0, true));
		$token->addUseItem('param');
		$token->setReturnType('int');
		$token->addToBody(new ReturnStatementToken(new ConstValueToken(1)));
		
		self::assertTransformation(
			'function($p,?int $i=0) use ($param):int{return 1;}',
			$token,
			[
				FunctionTransform::class,
				CodeScopeTokenTransform::class,
				ParamListDefinitionTransform::class,
				ParamDefinitionTransform::class,
				NameTokenTransform::class,
				ConstValueTokenTransform::class,
				ReturnStatementTokenTransform::class,
				UseScopeTransform::class,
				UseItemTokenTransform::class
			]
		);
	}
}