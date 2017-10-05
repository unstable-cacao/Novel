<?php
namespace Novel\Core\Stream;


use Novel\Core\IIdent;


interface IIdentReadStream
	extends \Countable, \ArrayAccess, \Traversable
{
	public function curr(): IIdent;
	public function next(): IIdent;
	public function prev(): IIdent;
	
	public function currIndex(): int;
}