<?php
namespace Novel\Tokens\Functions;


use Novel\AccessType;
use Novel\Core\IToken;
use Novel\Core\Tokens\Functions\IAccessibilityToken;
use Novel\Core\Tokens\Functions\IMethodToken;


class MethodToken extends AbstractFunctionToken implements IMethodToken
{
	/** @var IAccessibilityToken */
	private $accessibility;
	
	/** @var bool */
	private $isAbstract = false;
	
	/** @var bool */
	private $isStatic = false;
	
	
	/**
	 * @param string|IAccessibilityToken $level
	 */
	public function setAccessibility($level): void
	{
		if (is_string($level))
		{
			$level = new AccessibilityToken($level);
		}
		else if (!($level instanceof IAccessibilityToken))
		{
			throw  new \Exception("Level must be string or instance of IAccessibilityToken");
		}
		
		$level->setParent($this);
		$this->accessibility = $level;
	}
	
	public function getAccessibility(): string
	{
		return $this->accessibility->getLevel();
	}
	
	public function getAccessibilityToken(): IAccessibilityToken
	{
		return $this->accessibility;
	}
	
	public function setPublic()
	{
		$this->accessibility->setLevel(AccessType::PUBLIC);
	}
	
	public function setProtected()
	{
		$this->accessibility->setLevel(AccessType::PROTECTED);
	}
	
	public function setPrivate()
	{
		$this->accessibility->setLevel(AccessType::PRIVATE);
	}
	
	public function isAbstract(): bool
	{
		return $this->isAbstract;
	}
	
	public function setIsAbstract(bool $isAbstract): void
	{
		$this->isAbstract = $isAbstract;
	}
	
	public function isStatic(): bool
	{
		return $this->isStatic;
	}
	
	public function setIsStatic(bool $isStatic): void
	{
		$this->isStatic = $isStatic;
	}
	
	public function count(): int
	{
		return 5;
	}
	
	public function hasChildren(): bool
	{
		return true;
	}
	
	/**
	 * @return IToken[]
	 */
	public function children(): array
	{
		return array_merge([$this->accessibility, parent::children()]);
	}
}