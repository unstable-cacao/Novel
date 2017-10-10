<?php
namespace Novel\Core\Stream;


use Novel\Core\ISymbol;


interface ISymbolReadStream
	extends \Countable, \ArrayAccess, \Traversable
{
	public function curr(): ISymbol;
	public function next(): ISymbol;
	public function prev(): ISymbol;
	
	public function currIndex(): int;
}