<?php
namespace Novel\SanityTest;


use Novel\Tokens\ClassName\NamespaceToken;
use Novel\Tokens\Consts\ConstValueToken;
use Novel\Tokens\FlowControl\IfStatement\IfConditionToken;
use Novel\Tokens\FlowControl\IfStatementToken;
use Novel\Tokens\Functions\FunctionCallToken;
use Novel\Tokens\Functions\Params\ParamDefinitionToken;
use Novel\Tokens\Named\NameToken;
use Novel\Tokens\OOP\ClassToken;
use Novel\Tokens\OOP\Methods\MethodToken;
use Novel\Tokens\Operators\GenericBinaryOperation;
use Novel\Tokens\Operators\GenericUnaryOperationToken;
use Novel\Tokens\Reference\NamedVariableToken;
use Novel\Tokens\Scope\CodeScopeToken;
use Novel\Tokens\Scope\FileScopeToken;
use Novel\Tokens\Strings\DoubleQuoteStringToken;
use Novel\Transformation\Utils\SymbolDumperPostTransform;


class SanityTest extends TransformationTestCase
{
	public function test_TestClass()
	{
		$fileToken = new FileScopeToken();
		
		$namespace = new NamespaceToken();
		$namespace->addParts('Novel', 'SanityTest', 'TestFiles');
		$fileToken->add($namespace);
		
		$class = new ClassToken();
		$class->getDeclarationToken()->setName('TestClass');
		
		$definition = $class->getDefinitionToken();
		
		$function = new MethodToken('assertEquals');
		
		$expected = new NamedVariableToken('expected');
		$real = new NamedVariableToken('real');
		$message = new NamedVariableToken('message');
		
		$function->addParam($expected->getNameToken(), $real->getNameToken(), new ParamDefinitionToken('message', 'string', '', false));
		
		$condition = new GenericUnaryOperationToken('!');
		$condition->setOperand($message);
		
		// create if token with condition
		$if = new IfConditionToken($condition);
		
		// create if body token
		$ifBody = new CodeScopeToken();
		
		// start of statement
		$lastPart = new GenericBinaryOperation('.');
		$printFunction = new FunctionCallToken(new NameToken('print_r'));
		$printFunction->addParameter($real, ConstValueToken::true());
		$lastPart->setOperands(new DoubleQuoteStringToken(" equals to expected "), $printFunction);
		
		$middlePart = new GenericBinaryOperation('.');
		$printFunction = new FunctionCallToken(new NameToken('print_r'));
		$printFunction->addParameter($expected, ConstValueToken::true());
		$middlePart->setOperands($printFunction, $lastPart);
		
		$firstPart = new GenericBinaryOperation('.');
		$firstPart->setOperands(new DoubleQuoteStringToken("Failed asserting that "), $middlePart);
		
		$statement = new GenericBinaryOperation('=');
		$statement->setOperands($message, $firstPart);
		// end of statement
		
		// add the parts together
		$ifBody->add($statement);
		$if->setBody($ifBody);
		$ifStatement = new IfStatementToken();
		$ifStatement->addCondition($if);
		
		$function->addToBody($ifStatement);
		
		// create if token with condition
		$condition = new GenericBinaryOperation('!==');
		$condition->setOperands($expected, $real);
		$if = new IfConditionToken($condition);
		
		// create if body token
		$ifBody = new CodeScopeToken();
		
		$echo = new FunctionCallToken(new NameToken('echo'));
		$echo->addParameter($message);
		
		// add the parts together
		$ifBody->add($echo);
		$if->setBody($ifBody);
		$ifStatement = new IfStatementToken();
		$ifStatement->addCondition($if);
		
		$function->addToBody($ifStatement);
		
		$definition->add($function);
		$fileToken->add($class);
		
		$setup = [SymbolDumperPostTransform::class];
		self::assertTransformation(file_get_contents(__DIR__ . '/TestFiles/TestClass.php'), $fileToken);
	}
}