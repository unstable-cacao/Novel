<?php
namespace Novel\Transformation;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\Constant\FalseSymbol;
use Novel\Symbols\Constant\NullSymbol;
use Novel\Symbols\Constant\TrueSymbol;
use Novel\Symbols\ConstStringSymbol;
use Novel\Tokens\ConstValueToken;


class ConstValueTokenTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof ConstValueToken))
			return;
		
		$value = $token->value();
		
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
			$stream->push(new ConstStringSymbol("\'$value\'"));
		}
		else
		{
			$stream->push(new ConstStringSymbol((string)$value));
		}
	}
}