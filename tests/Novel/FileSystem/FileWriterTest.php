<?php
namespace Novel\FileSystem;


use PHPUnit\Framework\TestCase;


class FileWriterTest extends TestCase
{
	public function test_write_PathNotValid_ThrowException()
	{
		
	}
	
	public function test_write_NoPermissionToCreateDirectory_ThrowException()
	{
		
	}
	
	public function test_write_FileExists_OverwriteContent()
	{
		
	}
	
	public function test_write_NoPermissionsToFile_ThrowException()
	{
		
	}
	
	public function test_write_FileNotExists_CreatesFile()
	{
		
	}
	
	
	public function test_mkDirRecursively_ParamEmpty_DoNothing()
	{
		self::assertEquals(0, FileWriter::mkDirRecursively([]));
	}
	
	public function test_mkDirRecursively_FirstElementEmptyString_IgnoreIt()
	{
		self::assertEquals(0, FileWriter::mkDirRecursively(['']));
	}
	
	public function test_mkDirRecursively_SomeOfChainNotExist_CreateMissing()
	{
		$path = explode('/', __DIR__ . '/TestOne/TestTwo/TestThree');
		
		self::assertEquals(3, FileWriter::mkDirRecursively($path));
		
		rmdir(__DIR__ . '/TestOne/TestTwo/TestThree');
		rmdir(__DIR__ . '/TestOne/TestTwo');
		rmdir(__DIR__ . '/TestOne');
	}
	
	public function test_mkDirRecursively_AllChainExist_DoNothing()
	{
		mkdir(__DIR__ . '/TestOne');
		mkdir(__DIR__ . '/TestOne/TestTwo');
		mkdir(__DIR__ . '/TestOne/TestTwo/TestThree');
		$path = explode('/', __DIR__ . '/TestOne/TestTwo/TestThree');
		
		self::assertEquals(0, FileWriter::mkDirRecursively($path));
		
		rmdir(__DIR__ . '/TestOne/TestTwo/TestThree');
		rmdir(__DIR__ . '/TestOne/TestTwo');
		rmdir(__DIR__ . '/TestOne');
	}
	
	/**
	 * @expectedException \Novel\FileSystem\Exceptions\MkDirPermissionDeniedException
	 */
	public function test_mkDirRecursively_NoPermissions_ThrowException()
	{
		$path = explode('/', '/home/root/test');
		
		FileWriter::mkDirRecursively($path);
	}
}