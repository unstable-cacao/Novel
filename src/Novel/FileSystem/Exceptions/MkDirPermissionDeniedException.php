<?php
namespace Novel\FileSystem\Exceptions;


class MkDirPermissionDeniedException extends PermissionDeniedException
{
	public function __construct(string $dirName)
	{
		parent::__construct("Permission denied to create directory $dirName");
	}
}