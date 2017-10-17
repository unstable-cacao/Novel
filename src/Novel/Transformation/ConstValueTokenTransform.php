<?php
namespace Novel\Transformation;


use Novel\Core\ISymbol;
use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Stream\SymbolWriteStream;
use Novel\Symbols\Constant\FalseSymbol;
use Novel\Symbols\Constant\NullSymbol;
use Novel\Symbols\Constant\TrueSymbol;
use Novel\Symbols\ConstStringSymbol;
use Novel\Tokens\ConstValueToken;


class ConstValueTokenTransform implements ITokenTransform
{
	/**
	 * @param IToken $token
	 * @param ITokenTransformStream $stream
	 * @return ISymbol[]|null
	 */
	public function transform(IToken $token, ITokenTransformStream $stream): ?array
	{
		if ($token instanceof ConstValueToken)
		{
			$writer = new SymbolWriteStream();
			$value = $token->value();
			
			if (is_bool($value))
			{
				if ($value)
					$writer->push(new TrueSymbol());
				else
					$writer->push(new FalseSymbol());
			}
			else if (is_null($value))
			{
				$writer->push(new NullSymbol());
			}
			else if (is_string($value))
			{
				$writer->push(new ConstStringSymbol("\'$value\'"));
			}
			else 
			{
				$writer->push(new ConstStringSymbol((string)$value));
			}
			
			return $writer->getSymbols();
		}
		
		return null;
	}
}