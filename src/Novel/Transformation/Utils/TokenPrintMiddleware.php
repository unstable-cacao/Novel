<?php
namespace Novel\Transformation\Utils;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Transforming\ITokenMiddlewareTransform;


class TokenPrintMiddleware implements ITokenMiddlewareTransform
{
	private $depth = 0;
	
	
	public function executeTransform(IToken $token, ITokenTransformStream $writer, callable $next): void
	{
		$name = get_class($token);
		
		echo str_repeat("\t", $this->depth) . "$name\n";
		
		$this->depth++;
		$writer->push($next());
		$this->depth--;
	}
}