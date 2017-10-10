<?php
namespace Novel\Parsing;


use Novel\Core\IIdent;
use Novel\Core\Parsing\IIdentParser;
use Novel\Idents\WhiteSpace\NewLineIdent;
use Novel\Idents\WhiteSpace\SpaceIdent;
use Novel\Idents\WhiteSpace\TabIdent;


class WhiteSpaceIdentParser implements IIdentParser
{
	private $tabCharacter = "\t";
	
	private $newLineCharacter = PHP_EOL;
	
	
	public function setTabCharacter(string $tab): IIdentParser
	{
		$this->tabCharacter = $tab;
		return $this;
	}
	
	public function setNewLineCharacter(string $newLine): IIdentParser
	{
		$this->newLineCharacter = $newLine;
		return $this;
	}
	
	public function parse(IIdent $ident): ?string
	{
		if ($ident instanceof NewLineIdent)
		{
			return $this->newLineCharacter;
		}
		else if ($ident instanceof TabIdent)
		{
			return $this->tabCharacter;
		}
		else if ($ident instanceof SpaceIdent)
		{
			return " ";
		}
		
		return null;
	}
}