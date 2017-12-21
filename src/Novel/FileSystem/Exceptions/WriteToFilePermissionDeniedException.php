<?php
namespace Novel\FileSystem\Exceptions;


class WriteToFilePermissionDeniedException extends PermissionDeniedException
{
	public function __construct(string $fileName)
	{
		parent::__construct("Permission denied to write to file $fileName");
	}
}