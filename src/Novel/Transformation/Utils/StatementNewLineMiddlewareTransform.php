<?php
namespace Novel\Transformation\Utils;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Transforming\ITokenMiddlewareTransform;


class StatementNewLineMiddlewareTransform implements ITokenMiddlewareTransform
{
	public function executeTransform(IToken $token, ITokenTransformStream $writer, callable $next): void
	{
		$writer->push($next());
	}
}