<?php
namespace Novel\Transformation\OOP;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\OOP\ClassType\IClassDefinitionToken;
use Novel\Core\Tokens\OOP\InterfaceType\IInterfaceDefinitionToken;
use Novel\Core\Tokens\OOP\TraitType\ITraitDefinitionToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\Bracket\CurlyBracketCloseSymbol;
use Novel\Symbols\Bracket\CurlyBracketOpenSymbol;


class OOPDefinitionTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		
		
		if (!($token instanceof IClassDefinitionToken || 
			$token instanceof IInterfaceDefinitionToken || 
			$token instanceof ITraitDefinitionToken))
			return;
		
		$stream->push(CurlyBracketOpenSymbol::class);
		$stream->transformChildren($token);
		$stream->push(CurlyBracketCloseSymbol::class);
	}
}