<?php
namespace Novel\FileSystem\Exceptions;


class PathEmptyException extends \Exception
{
	public function __construct()
	{
		parent::__construct("Path cannot be empty");
	}
}