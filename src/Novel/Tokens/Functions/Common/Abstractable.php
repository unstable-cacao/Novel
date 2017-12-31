<?php
namespace Novel\Tokens\Functions\Common;


use Novel\Core\Tokens\Functions\Common\IAbstractable;


class Abstractable implements IAbstractable
{
	/** @var bool */
	private $abstractable = false;
	
	
	public function isAbstract(): bool
	{
		return $this->abstractable;
	}
	
	public function setIsAbstract(bool $isAbstract): void
	{
		$this->abstractable = $isAbstract;
	}
}