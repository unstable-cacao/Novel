<?php
namespace Novel\Tokens\OOP\Accessibility;


use Novel\AccessType;
use Novel\Core\Tokens\OOP\Accessibility\IAccessibilityToken;
use Novel\Tokens\Base\AbstractChildlessToken;


class AccessibilityToken extends AbstractChildlessToken implements IAccessibilityToken
{
	/** @var string|null */
	private $level;
	
	
	public function __construct(?string $level = null)
	{
		$this->level = $level;
	}

	
	public function setLevel(?string $level): void
	{
		$this->level = $level;
	}

	public function getLevel(): ?string
	{
		return $this->level;
	}

	public function isDefined(): bool
	{
		return (bool)$this->level;
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