<?php
namespace Novel\Tokens\Functions\Common;


trait TStaticable
{
	/** @var bool */
	private $staticable = false;
	
	
	public function isStatic(): bool
	{
		return $this->staticable;
	}
	
	public function setIsStatic(bool $isStatic): void
	{
		$this->staticable = $isStatic;
	}
}