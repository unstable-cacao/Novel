<?php
namespace Novel\Tokens\Functions\Common;


trait TAbstractable
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