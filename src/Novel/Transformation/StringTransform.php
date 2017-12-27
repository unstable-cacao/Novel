<?php
namespace Novel\Transformation;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\Strings\IHeredocToken;
use Novel\Core\Tokens\Strings\IDoubleQuoteStringToken;
use Novel\Core\Transforming\ITokenTransform;


class StringTransform implements ITokenTransform
{
	private function transformDoubleQuote(IToken $token, ITokenTransformStream $stream): void
	{
		
	}
	
	
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if ($token instanceof IDoubleQuoteStringToken)
		{
			$this->transformDoubleQuote($token, $stream);
		}
		else if ($token instanceof IHeredocToken)
		{
			
		}
	}
}