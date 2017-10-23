<?php
namespace Novel\Tokens\Functions;


use Novel\Core\Tokens\Functions\IAccessibilityToken;
use Novel\Tokens\Base\AbstractTreeToken;


class AccessibilityToken extends AbstractTreeToken implements IAccessibilityToken
{
	public function setLevel(?string $level): void
	{
		// TODO: Implement setLevel() method.
	}
	
	public function getLevel(): ?string
	{
		// TODO: Implement getLevel() method.
	}
	
	
	public function isDefined(): bool
	{
		// TODO: Implement isDefined() method.
	}
	
	
	public function isPrivate(): bool
	{
		// TODO: Implement isPrivate() method.
	}
	
	public function isProtected(): bool
	{
		// TODO: Implement isProtected() method.
	}
	
	public function isPublic(): bool
	{
		// TODO: Implement isPublic() method.
	}
}