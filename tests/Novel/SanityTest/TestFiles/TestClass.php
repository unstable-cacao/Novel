<?php

namespace Novel\SanityTest\TestFiles;
class TestClass
{
public function assertEquals($expected,$real,string $message='')
{
if(!$message)
{
$message="Failed asserting that ".print_r($expected,true)." equals to expected ".print_r($real,true);
}
if($expected!==$real)
{
echo($message);
$a=25;
}
}
}
