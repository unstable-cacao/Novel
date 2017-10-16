<?php
namespace Novel\Core\Stream;


use Novel\Core\ISymbol;
use Novel\Core\IToken;


interface ITransformStream extends ISymbolWriteStream
{
	/**
	 * @param IToken $of
	 * @return ISymbol[]
	 */
	public function transformChildren(IToken $of): array;
    
    /**
     * @param IToken $token
     * @return ISymbol[]
     */
    public function transformToken(IToken $token): array;
}