<?php
namespace Novel\Transformation\Utils;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\Abstraction\Statements\IStatementToken;
use Novel\Core\Tokens\Scope\IScopeToken;
use Novel\Core\Transforming\ITokenMiddlewareTransform;
use Novel\Symbols\WhiteSpace\NewLineSymbol;


class StatementNewLineMiddlewareTransform implements ITokenMiddlewareTransform
{
	public function executeTransform(IToken $token, ITokenTransformStream $writer, callable $next): void
	{
		$writer->push($next());
		
		if ($token->parent() instanceof IScopeToken && $token instanceof IStatementToken)
			$writer->push(NewLineSymbol::class);
	}
}