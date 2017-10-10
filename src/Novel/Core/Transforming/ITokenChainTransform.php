<?php
namespace Novel\Core\Transforming;


use Novel\Core\ISymbol;
use Novel\Core\IToken;


interface ITokenChainTransform
{
	/**
	 * @param IToken $token
	 * @return ISymbol[]
	 */
	public function preTransform(IToken $token): array;
	
	/**
	 * @param IToken $token
	 * @return ISymbol[]
	 */
	public function postTransform(IToken $token): array;
}