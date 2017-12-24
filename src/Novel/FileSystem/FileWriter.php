<?php
namespace Novel\FileSystem;


use Novel\FileSystem\Exceptions\MkDirPermissionDeniedException;
use Novel\FileSystem\Exceptions\MkDirUnexpectedExceptionOccurredException;
use Novel\FileSystem\Exceptions\PathEmptyException;
use Novel\FileSystem\Exceptions\WriteToFilePermissionDeniedException;
use Novel\FileSystem\Exceptions\WriteToFileUnexpectedExceptionOccurredException;


class FileWriter
{
	public static function write(string $path, string $content): void
	{
		if (!$path)
			throw new PathEmptyException();
		
		$parts = explode('/', $path);
		array_pop($parts);
		self::mkDirRecursively($parts);
		
		try
		{
			if (file_put_contents($path, $content) === false)
				throw new WriteToFileUnexpectedExceptionOccurredException($path);
		}
		catch (\Throwable $exception)
		{
			if (strpos($exception->getMessage(), 'Permission denied') !== false)
				throw new WriteToFilePermissionDeniedException($path);
			
			throw $exception;
		}
	}
	
	public static function mkDirRecursively(array $dirs): int
	{
		$dir = [];
		$dirsCreated = 0;
		
		foreach ($dirs as $directory)
		{
			$dir[] = $directory;
			$dirPath = implode('/', $dir);
			
			if ($dirPath && !is_dir($dirPath))
			{
				try
				{
					if (mkdir($dirPath) === false)
						throw new MkDirUnexpectedExceptionOccurredException($dirPath);
				}
				catch (\Throwable $exception)
				{
					if (strpos($exception->getMessage(), 'Permission denied') !== false)
						throw new MkDirPermissionDeniedException($dirPath);
					
					throw $exception;
				}
				
				$dirsCreated++;
			}
		}
		
		return $dirsCreated;
	}
}