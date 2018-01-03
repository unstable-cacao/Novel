<?php
namespace Novel\Transformation\Functions;


use Novel\AccessType;
use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\OOP\Accessibility\IAccessibilityToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\Keyword\DefaultSymbol;
use Novel\Symbols\Keyword\PrivateSymbol;
use Novel\Symbols\Keyword\ProtectedSymbol;
use Novel\Symbols\Keyword\PublicSymbol;


class AccessibilityTransform implements ITokenTransform
{
	private $defaultAccessibility;
	
	
	private function getSymbolFor(string $accessibility): string
	{
		switch ($accessibility)
		{
			case AccessType::DEFAULT:
				return DefaultSymbol::class;
			case AccessType::PRIVATE:
				return PrivateSymbol::class;
			case AccessType::PROTECTED:
				return ProtectedSymbol::class;
			case AccessType::PUBLIC:
				return PublicSymbol::class;
			default:
				throw new \Exception("Accessibility type \'$accessibility\', does not exist");
		}
	}
	
	
	public function __construct(?string $defaultAccessibility = null)
	{
		$this->defaultAccessibility = $defaultAccessibility;
	}
	
	
	public function setDefault(?string $accessibility = null): void
	{
		$this->defaultAccessibility = $accessibility;
	}
	
	
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IAccessibilityToken))
			return;
		
		if (!$token->isDefined())
		{
			if ($this->defaultAccessibility)
			{
				$stream->push($this->getSymbolFor($this->defaultAccessibility));
			}
			else
			{
				return;
			}
		}
		
		$stream->push($this->getSymbolFor($token->getLevel()));
	}
}