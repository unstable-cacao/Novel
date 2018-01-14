<?php
namespace Novel\Transformation;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\Consts\IConstValueToken;
use Novel\Core\Tokens\OOP\Accessibility\IWithAccessibilityToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\Constant\FalseSymbol;
use Novel\Symbols\Constant\NullSymbol;
use Novel\Symbols\Constant\TrueSymbol;
use Novel\Symbols\ConstStringSymbol;


class ConstValueTokenTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IConstValueToken))
			return;
		
		if ($token instanceof IWithAccessibilityToken)
			$stream->push($token->getAccessibilityToken());
		
		$value = $token->getValue();
		
		if (is_bool($value))
		{
			if ($value)
				$stream->push(TrueSymbol::class);
			else
				$stream->push(FalseSymbol::class);
		}
		else if (is_null($value))
		{
			$stream->push(NullSymbol::class);
		}
		else if (is_string($value))
		{
			$stream->push(new ConstStringSymbol("'$value'"));
		}
		else
		{
			$stream->push(new ConstStringSymbol((string)$value));
		}
	}
}