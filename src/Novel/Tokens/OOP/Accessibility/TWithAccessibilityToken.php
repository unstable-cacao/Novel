<?php
namespace Novel\Tokens\OOP\Accessibility;


use Novel\Core\Tokens\OOP\Accessibility\IAccessibilityToken;


trait TWithAccessibilityToken
{
	private $accessibilityToken;
	
	
	public function getAccessibilityToken(): IAccessibilityToken
	{
		if (!$this->accessibilityToken)
			$this->accessibilityToken = new AccessibilityToken();
		
		return $this->accessibilityToken;
	}
	
	public function getAccessibility(): ?string
	{
		return $this->getAccessibilityToken()->getLevel();
	}

	/**
	 * @param string|IAccessibilityToken|null $level
	 */
	public function setAccessibility($level): void
	{
		$this->getAccessibilityToken()->setLevel($level);
	}
}