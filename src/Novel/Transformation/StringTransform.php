<?php
namespace Novel\Transformation;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\Strings\IHeredocToken;
use Novel\Core\Tokens\Strings\IDoubleQuoteStringToken;
use Novel\Core\Tokens\Strings\IInStringExpressionToken;
use Novel\Core\Tokens\Strings\INowdocToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\Bracket\CurlyBracketCloseSymbol;
use Novel\Symbols\Bracket\CurlyBracketOpenSymbol;
use Novel\Symbols\ConstStringSymbol;
use Novel\Symbols\DoubleQuotationMarkSymbol;
use Novel\Symbols\SingleQuotationMarkSymbol;
use Novel\Symbols\TripleArrowSymbol;
use Novel\Symbols\WhiteSpace\NewLineSymbol;


class StringTransform implements ITokenTransform
{
	private function transformDoubleQuote(IDoubleQuoteStringToken $token, ITokenTransformStream $stream): void
	{
		$stream->push(DoubleQuotationMarkSymbol::class);
		$stream->transformChildren($token);
		$stream->push(DoubleQuotationMarkSymbol::class);
	}
	
	private function transformHeredoc(IHeredocToken $token, ITokenTransformStream $stream): void
	{
		$stream->push(TripleArrowSymbol::class);
		
		$symbol = new ConstStringSymbol($token->getName());
		$stream->push($symbol);
		
		$stream->push(NewLineSymbol::class);
		$stream->transformChildren($token);
		$stream->push(NewLineSymbol::class);
		
		$stream->push($symbol);
	}
	
	private function transformNowdoc(INowdocToken $token, ITokenTransformStream $stream): void
	{
		$stream->push(TripleArrowSymbol::class);
		$stream->push(SingleQuotationMarkSymbol::class);
		
		$symbol = new ConstStringSymbol($token->getName());
		$stream->push($symbol);
		
		$stream->push(SingleQuotationMarkSymbol::class);
		
		$stream->push(NewLineSymbol::class);
		$stream->transformToken($token->getPlainText());
		$stream->push(NewLineSymbol::class);
		
		$stream->push($symbol);
	}
	
	private function transformInStringExpression(IInStringExpressionToken $token, ITokenTransformStream $stream): void
	{
		$stream->push(CurlyBracketOpenSymbol::class);
		$stream->transformChildren($token);
		$stream->push(CurlyBracketCloseSymbol::class);
	}
	
	
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if ($token instanceof IDoubleQuoteStringToken)
		{
			$this->transformDoubleQuote($token, $stream);
		}
		else if ($token instanceof IHeredocToken)
		{
			$this->transformHeredoc($token, $stream);
		}
		else if ($token instanceof IInStringExpressionToken)
		{
			$this->transformInStringExpression($token, $stream);
		}
		else if ($token instanceof INowdocToken)
		{
			$this->transformNowdoc($token, $stream);
		}
	}
}