<?php
namespace Novel\Transformation\FlowControl;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\FlowControl\IIfStatementToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\Bracket\CurlyBracketCloseSymbol;
use Novel\Symbols\Bracket\CurlyBracketOpenSymbol;
use Novel\Symbols\Keyword\ElseSymbol;
use Novel\Symbols\WhiteSpace\SpaceSymbol;


class IfStatementTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IIfStatementToken))
			return;
		
		$conditions = $token->getConditions();
		
		if ($conditions)
		{
			$stream->transformToken($conditions[0]);
			
			for ($i = 1; $i < count($conditions) - 1; $i++)
			{
				$stream->push(ElseSymbol::class);
				$stream->push(SpaceSymbol::class);
				$stream->transformToken($conditions[$i]);
			}
			
			if ($token->hasElseStatement())
			{
				$stream->push(ElseSymbol::class);
				$stream->push(CurlyBracketOpenSymbol::class);
				$stream->transformToken($token->getElseStatement());
				$stream->push(CurlyBracketCloseSymbol::class);
			}
		}
	}
}