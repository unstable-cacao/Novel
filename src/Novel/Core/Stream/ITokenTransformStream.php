<?php
namespace Novel\Core\Stream;


use Novel\Core\IToken;
use Novel\Core\ISymbol;
use Novel\Core\ITreeToken;


interface ITokenTransformStream
{
	public function count(): int;
	public function isEmpty(): bool;
	public function clear(): void;
	
	/**
	 * @param ISymbol|ISymbol[]|IToken|IToken[] $item
	 * @return array
	 */
	public function push($item): array;
    
    /**
     * @param IToken $token
     * @return ISymbol[]
     */
    public function transformToken(IToken $token): array;
	
	/**
	 * @param ITreeToken $of
	 * @return ISymbol[]
	 */
	public function transformChildren(ITreeToken $of): array;

	/**
	 * @return ISymbol[]
	 */
	public function getSymbols(): array;
}