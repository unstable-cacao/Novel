<?php
namespace Novel\Transformation\Utils;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\Scope\IFileScopeToken;
use Novel\Core\Tokens\Scope\IScopeToken;
use Novel\Core\Transforming\ITokenMiddlewareTransform;
use Novel\Symbols\WhiteSpace\NewLineSymbol;


class StatementNewLineMiddlewareTransform implements ITokenMiddlewareTransform
{
	/** @var IToken[] */
	private $stuck = [];
	
	/** @var array  */
	private $isFirst = [];
	
	/** @var IToken */
	private $last = null;
	
	
	public function executeTransform(IToken $token, ITokenTransformStream $writer, callable $next): void
	{
		$addNewLine = ($this->last instanceof IScopeToken);
		$isFirst = ($this->isFirst && $this->isFirst[count($this->stuck) - 1]);
		
		if ($this->isFirst)
			$this->isFirst[count($this->stuck) - 1] = false;
		
		array_push($this->stuck, $this->last);
		array_push($this->isFirst, true);
		$this->last = $token;
		
		if ($token instanceof IScopeToken && !($token instanceof IFileScopeToken))
			$writer->push(NewLineSymbol::class);
		
		if ($addNewLine && $isFirst && !($token instanceof IFileScopeToken))
			$writer->push(NewLineSymbol::class);
		
		$writer->push($next());
		
		if ($addNewLine)
			$writer->push(NewLineSymbol::class);
		
		$this->last = array_pop($this->stuck);
		array_pop($this->isFirst);
	}
}