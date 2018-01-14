<?php
namespace Novel\Utils;


use PHPUnit\Framework\TestCase;


class ClassExtractorTest extends TestCase
{
	public function test_extract_ClassExists_ReturnClass()
	{
		self::assertEquals([
				'Novel\Utils\TestFiles\TestClass' => []
			], 
			ClassExtractor::extract(__DIR__ . '/TestFiles/TestClass.php')
		);
	}
	
	public function test_extract_ClassesExist_ReturnClasses()
	{
		self::assertEquals([
				'Novel\Utils\TestFiles\TestClasses' 		=> [],
				'Novel\Utils\TestFiles\TestClassesSecond' 	=> []
			],
			ClassExtractor::extract(__DIR__ . '/TestFiles/TestClasses.php')
		);
	}
	
	public function test_extract_ParentExists()
	{
		self::assertEquals([
				'Novel\Utils\TestFiles\TestParent' => ['\DateTime']
			],
			ClassExtractor::extract(__DIR__ . '/TestFiles/TestParent.php')
		);
	}
	
	public function test_extract_InterfaceExists()
	{
		self::assertEquals([
				'Novel\Utils\TestFiles\TestInterface' => ['\Countable']
			],
			ClassExtractor::extract(__DIR__ . '/TestFiles/TestInterface.php')
		);
	}
	
	public function test_extract_InterfacesExist()
	{
		self::assertEquals([
				'Novel\Utils\TestFiles\TestInterfaces' => ['\Countable', '\SeekableIterator']
			],
			ClassExtractor::extract(__DIR__ . '/TestFiles/TestInterfaces.php')
		);
	}
	
	public function test_extract_ExtensionInSameNamespace()
	{
		self::assertEquals([
				'Novel\Utils\TestFiles\TestExtensionInSameNamespace' 	=> ['Novel\Utils\TestFiles\IInterface'],
				'Novel\Utils\TestFiles\IInterface' 						=> []
			],
			ClassExtractor::extract(__DIR__ . '/TestFiles/TestExtensionInSameNamespace.php')
		);
	}
	
	public function test_extract_ExtensionInUse()
	{
		self::assertEquals([
				'Novel\Utils\TestFiles\TestExtensionInUse' 	=> ['Novel\Core\IToken']
			],
			ClassExtractor::extract(__DIR__ . '/TestFiles/TestExtensionInUse.php')
		);
	}
	
	public function test_extract_ParentAndInterfaceExist()
	{
		self::assertEquals([
				'Novel\Utils\TestFiles\TestParentAndInterfaceExist' => ['\DateTime', '\Countable']
			],
			ClassExtractor::extract(__DIR__ . '/TestFiles/TestParentAndInterfaceExist.php')
		);
	}
	
	public function test_extract_ClassTokenThatIsNotClass()
	{
		self::assertEquals([
			'Novel\Utils\TestFiles\TestClassNotClass' => []
		],
			ClassExtractor::extract(__DIR__ . '/TestFiles/TestClassNotClass.php')
		);
	}
}