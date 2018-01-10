<?php
namespace Novel\Setup;


use Novel\Parsing\WhiteSpaceSymbolParser;
use Novel\Parsing\ConstStringSymbolParser;
use Novel\Parsing\SingleStringSymbolParser;

use Novel\Transformation\Arrays;
use Novel\Transformation\Comments;
use Novel\Transformation;
use Novel\Transformation\Functions;
use Novel\Transformation\OOP;
use Novel\Transformation\Reference;
use Novel\Transformation\Scope;


class StandardClasses
{
	public const TRANSFORMERS =
	[
		Arrays\ArrayAccessTransform::class,
		Arrays\ArrayDefinitionTransform::class,
		Arrays\ArrayPushElementOperationTransform::class,
		Arrays\ArrayUnwrapTransform::class,
		Arrays\SimpleKeyValueTransform::class,
		
		Comments\MultiLineCommentTransform::class,
		Comments\OneLineCommentTransform::class,
		
		Functions\FunctionCallTransform::class,
		Functions\FunctionTransform::class,
		Functions\InvokeParametersListTransform::class,
		Functions\ParamDefinitionTransform::class,
		Functions\ParamListDefinitionTransform::class,
		Functions\ReturnExpressionTokenTransform::class,
		Functions\UseItemTokenTransform::class,
		Functions\UseScopeTransform::class,
		
		OOP\AccessibilityTransform::class,
		OOP\InterfaceTransformer::class,
		OOP\ConstDeclarationTransform::class,
		OOP\TraitTransform::class,
		OOP\MemberVariableTransform::class,
		
		Reference\NamedVariableTransform::class,
		
		Scope\CodeScopeTokenTransform::class,
		Scope\GlobalScopeTokenTransform::class,
		
		Transformation\ConstValueTokenTransform::class,
		Transformation\GeneralTokenTransformer::class,
		Transformation\NamespaceTokenTransform::class,
		Transformation\NameTokenTransform::class,
		Transformation\OperatorTokenTransformer::class,
		Transformation\PlainTextTransformer::class,
		Transformation\StatementTransform::class,
		Transformation\StringTransform::class
	];
	
	public const PARSERS = 
	[
		ConstStringSymbolParser::class,
		SingleStringSymbolParser::class,
		WhiteSpaceSymbolParser::class
	];
}