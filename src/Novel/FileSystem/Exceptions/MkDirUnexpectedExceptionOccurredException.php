<?php
namespace Novel\FileSystem\Exceptions;


class MkDirUnexpectedExceptionOccurredException extends UnexpectedExceptionOccurredException
{
	public function __construct(string $dirName)
	{
		parent::__construct("Unexpected exception occurred while trying to create directory $dirName");
	}
}