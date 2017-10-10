<?php
namespace Novel\Core\Parsing;


use Novel\Core\Stream\ISymbolReadStream;


interface ISymbolParsingObject
{
	public function setSymbolStream(ISymbolReadStream $stream): void;
}