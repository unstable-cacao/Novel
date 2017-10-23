<?php
namespace Novel;


use Traitor\TConstsClass;


class AccessType
{
	use TConstsClass;
	
	
	public const DEFAULT	= 'default';
	public const PRIVATE	= 'private';
	public const PROTECTED	= 'protected';
	public const PUBLIC		= 'public';
}