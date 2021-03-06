<?php
namespace Novel\Transformation;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\Abstraction\Statements\IExpressionStatementToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\SemicolonSymbol;


class StatementTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IExpressionStatementToken))
			return;
		
		$stream->push($token->getStatement());
		$stream->push(SemicolonSymbol::class);
	}
}