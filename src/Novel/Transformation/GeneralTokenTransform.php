<?php
namespace Novel\Transformation;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\Scope\IOODefinitionScopeToken;
use Novel\Core\Tokens\ScopeReference\IScopeReferenceToken;
use Novel\Core\Transforming\ITokenTransform;


class GeneralTokenTransform implements ITokenTransform
{
	private const GENERAL_TOKENS = [
		IScopeReferenceToken::class,
		IOODefinitionScopeToken::class
	];
	
	
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		$generalToken = false;
		
		foreach (self::GENERAL_TOKENS as $instance) 
		{
			if ($token instanceof $instance)
			{
				$generalToken = true;
				break;
			}
		}
		
		if (!$generalToken)
			return;
		
		$stream->transformChildren($token);
	}
}