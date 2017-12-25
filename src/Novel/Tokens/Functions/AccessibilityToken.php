<?php
namespace Novel\Tokens\Functions;


use Novel\AccessType;
use Novel\Core\Tokens\Functions\IAccessibilityToken;
use Novel\Tokens\Base\AbstractChildlessToken;


class AccessibilityToken extends AbstractChildlessToken implements IAccessibilityToken
{
	/** @var string|null */
	private $level;
	
	
	public function __construct(?string $level = null)
	{
		$this->setLevel($level);
	}
	
	
	public function setLevel(?string $level): void
	{
		if ($level && !AccessType::isConstValueExists($level))
			throw new \Exception("Level not valid. Must be private, protected, public or null");
		
		$this->level = $level;
	}
	
	public function getLevel(): ?string
	{
		return $this->level;
	}
	
	public function isDefined(): bool
	{
		return $this->level ? true : false;
	}
	
	public function isPrivate(): bool
	{
		return $this->level == AccessType::PRIVATE;
	}
	
	public function isProtected(): bool
	{
		return $this->level == AccessType::PROTECTED;
	}
	
	public function isPublic(): bool
	{
		return $this->level == AccessType::PUBLIC;
	}
}