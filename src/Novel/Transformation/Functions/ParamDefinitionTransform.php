<?php
namespace Novel\Transformation\Functions;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\Functions\Params\IParamDefinitionToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\DollarSymbol;
use Novel\Symbols\LogicOperator\QuestionMarkSymbol;
use Novel\Symbols\Operator\ArrayUnwrapSymbol;
use Novel\Symbols\Operator\EqualSymbol;
use Novel\Symbols\ReferenceSymbol;
use Novel\Symbols\WhiteSpace\SpaceSymbol;


class ParamDefinitionTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IParamDefinitionToken))
			return;
		
		if ($token->getType())
		{
			if ($token->isNullable())
			{
				$stream->push(QuestionMarkSymbol::class);
			}
			
			$stream->push($token->getTypeToken());
			$stream->push(SpaceSymbol::class);
		}
		
		if ($token->isVariadic())
		{
			$stream->push(ArrayUnwrapSymbol::class);
		}
		
		if ($token->isByReference())
		{
			$stream->push(ReferenceSymbol::class);
		}
		
		$stream->push(DollarSymbol::class);
		$stream->push($token->getNameToken());
		
		$defValue = $token->getDefaultValue();
		
		if ($defValue)
		{
			$stream->push(EqualSymbol::class);
			$stream->transformToken($defValue);
		}
	}
}