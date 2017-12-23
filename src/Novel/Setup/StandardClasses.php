<?php
namespace Novel\Setup;


use Novel\Parsing\WhiteSpaceSymbolParser;
use Novel\Parsing\ConstStringSymbolParser;
use Novel\Parsing\SingleStringSymbolParser;

use Novel\Transformation\Arrays;
use Novel\Transformation\Comments;


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
		Comments\OneLineCommentTransform::class
	];
	
	public const PARSERS = 
	[
		ConstStringSymbolParser::class,
		SingleStringSymbolParser::class,
		WhiteSpaceSymbolParser::class
	];
}