<?php
namespace Novel\Tokens\OOP\Declaration;


use Novel\Core\Tokens\IName;
use Novel\Core\Tokens\INamedToken;
use Novel\Core\Tokens\INameToken;
use Novel\Tokens\Named\NameToken;


trait TImplementsDeclarationToken
{
	/** @var INameToken[] */
	private $implementTargets = [];
	
	
	/**
	 * @param string|INamedToken|IName $target
	 */
	public function addImplement($target): void
	{
		if ($target instanceof INamedToken)
		{
			$target = $target->getName();
		}
		
		if (!is_string($target) && !($target instanceof IName))
			throw new \Exception("Target can be IName, INamedToken or string only");
		
		$target = new NameToken($target);
		$target->setParent($this);
		$this->implementTargets[] = $target;
	}
}