<?php
namespace Novel\Parsing;


use Novel\Core\ISymbol;
use Novel\Core\Parsing\ISymbolParser;
use Novel\Symbols\WhiteSpace\NewLineSymbol;
use Novel\Symbols\WhiteSpace\SpaceSymbol;
use Novel\Symbols\WhiteSpace\TabSymbol;


class WhiteSpaceSymbolParser implements ISymbolParser
{
	private $tabCharacter = "\t";
	
	private $newLineCharacter = PHP_EOL;
	
	
	public function setTabCharacter(string $tab): ISymbolParser
	{
		$this->tabCharacter = $tab;
		return $this;
	}
	
	public function setNewLineCharacter(string $newLine): ISymbolParser
	{
		$this->newLineCharacter = $newLine;
		return $this;
	}
	
	public function parse(ISymbol $symbol): ?string
	{
		if ($symbol instanceof NewLineSymbol)
		{
			return $this->newLineCharacter;
		}
		else if ($symbol instanceof TabSymbol)
		{
			return $this->tabCharacter;
		}
		else if ($symbol instanceof SpaceSymbol)
		{
			return " ";
		}
		
		return null;
	}
}