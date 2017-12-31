<?php
namespace Novel\Tokens\Functions\Common;


use Novel\Core\Tokens\Functions\Common\IStaticable;


class Staticable implements IStaticable
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