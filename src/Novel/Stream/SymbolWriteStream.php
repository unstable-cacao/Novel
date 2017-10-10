<?php
namespace Novel\Stream;


use Novel\Core\ISymbol;
use Novel\Core\Stream\ISymbolWriteStream;


class SymbolWriteStream implements ISymbolWriteStream
{
	/** @var ISymbol[] */
	private $symbols = [];


	/**
	 * @param ISymbol|ISymbol[] $item
	 * @return static|ISymbolWriteStream
	 */
	public function push($item): ISymbolWriteStream
	{
		if (is_array($item))
		{
			$this->symbols = array_merge($this->symbols, $item); 
		}
		else
		{
			$this->symbols[] = $item;
		}
		
		return $this;
	}
	

	/**
	 * @return ISymbol[]
	 */
	public function getSymbols(): array
	{
		return $this->symbols;
	}
}