<?php
namespace Novel\Core\Parsing;


use Novel\Core\Stream\IIdentReadStream;


interface IIdentParsingObject
{
	public function setIdentStream(IIdentReadStream $stream): void;
}