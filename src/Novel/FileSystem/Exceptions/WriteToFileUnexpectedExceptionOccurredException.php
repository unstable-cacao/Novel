<?php
namespace Novel\FileSystem\Exceptions;


class WriteToFileUnexpectedExceptionOccurredException extends UnexpectedExceptionOccurredException
{
	public function __construct(string $fileName)
	{
		parent::__construct("Unexpected exception occurred while trying to write to file $fileName");
	}
}