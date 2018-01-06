<?php
namespace Novel\Transformation\OOP;


use Novel\AccessType;

use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\OOP\Accessibility\IAccessibilityToken;
use Novel\Core\Transforming\ITokenTransform;

use Novel\Symbols\Keyword\PublicSymbol;
use Novel\Symbols\Keyword\PrivateSymbol;
use Novel\Symbols\Keyword\ProtectedSymbol;
use Novel\Symbols\WhiteSpace\SpaceSymbol;


class AccessibilityTransform implements ITokenTransform
{
	private function getSymbolFor(string $accessibility): string
	{
		switch ($accessibility)
		{
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
	
	
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IAccessibilityToken) || !$token->getLevel())
			return;
		
		$levelSymbol = $this->getSymbolFor($token->getLevel());
		$stream->push($levelSymbol);
		$stream->push(SpaceSymbol::class);
	}
}