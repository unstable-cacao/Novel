<?php
namespace Novel\Transformation\Functions;


use Novel\Core\ISymbol;
use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\Functions\IAccessibilityToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\Keyword\PublicSymbol;


class AccessibilityTransform implements ITokenTransform
{
	private $defaultAccessibility;
	
	
	private function getSymbolFor(string $accessibility): string
	{
		// TODO
		return PublicSymbol::class;
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
		
		$stream->push($this->getSymbolFor($this->defaultAccessibility));
	}
}