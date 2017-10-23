<?php
namespace Novel\Core\Tokens\Functions;


interface IMethodDefinitionToken extends IFunctionDefinitionToken
{
	/**
	 * @param string|IAccessibilityToken $level
	 */
	public function setAccessibility($level): void;
	
	public function getAccessibility(): string;
	public function getAccessibilityToken(): IAccessibilityToken;
	
	public function setPublic();
	public function setProtected();
	public function setPrivate();
	
	public function isAbstract(): bool;
	public function setIsAbstract(bool $isAbstract): void;
	
	public function isStatic(): bool;
	public function setIsStatic(bool $isStatic): void;
}