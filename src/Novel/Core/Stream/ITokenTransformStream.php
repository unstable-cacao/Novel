<?php
namespace Novel\Core\Stream;


use Novel\Core\IToken;
use Novel\Core\ISymbol;


interface ITokenTransformStream
{
	public function count(): int;
	public function isEmpty(): bool;
	public function clear(): void;
	
	/**
	 * @param string|string[]|ISymbol|ISymbol[]|IToken|IToken[] $item
	 * @return ISymbol[]
	 */
	public function push($item): array;
    
    /**
     * @param IToken $token
     * @return ISymbol[]
     */
    public function transformToken(IToken $token): array;
	
	/**
	 * @param IToken $of
	 * @return ISymbol[]
	 */
	public function transformChildren(IToken $of): array;

	/**
	 * @return ISymbol[]
	 */
	public function getSymbols(): array;
}