<?php
namespace Novel\Transformation\Functions;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\Functions\Params\IParamListDefinition;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\Bracket\RoundBracketCloseSymbol;
use Novel\Symbols\Bracket\RoundBracketOpenSymbol;
use Novel\Symbols\CommaSymbol;


class ParamListDefinitionTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IParamListDefinition))
			return;
		
		$stream->push(RoundBracketOpenSymbol::class);
		$children = $token->children();
		
		if ($children)
		{
			for ($i = 0; $i < count($children) - 1; $i++)
			{
				$stream->transformToken($children[$i]);
				$stream->push(CommaSymbol::class);
			}
			
			$stream->transformToken($children[$i]);
		}
		
		$stream->push(RoundBracketCloseSymbol::class);
	}
}