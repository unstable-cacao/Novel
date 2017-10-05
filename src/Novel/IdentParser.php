<?php
namespace Novel;


use Novel\Core\IIdent;
use Novel\Core\IMainParser;
use Novel\Core\Parsing\IParserSetup;
use Novel\Parsing\ParsersCollection;


class IdentParser implements IMainParser
{
	/** @var ParsersCollection */
	private $setup;
	
	
	private function parseIdent(IIdent $ident): string 
	{
		return $this->getPreString($ident) .
			$this->executeMiddleware($ident) .
			$this->getPostString($ident);
	}
	
	private function getPreString(IIdent $ident): string 
	{
		$chainParsers = $this->setup->getChainParsers($ident);
		$result = '';
		
		foreach ($chainParsers as $chainParser)
		{
			$res = $chainParser->preParse($ident);
			
			if (!is_null($res))
				$result .= $res;
		}
		
		return $result;
	}
	
	private function getPostString(IIdent $ident): string 
	{
		$chainParsers = $this->setup->getChainParsers($ident);
		$result = '';
		
		foreach ($chainParsers as $chainParser)
		{
			$res = $chainParser->postParse($ident);
			
			if (!is_null($res))
				$result .= $res;
		}
		
		return $result;
	}
	
	private function executeMiddleware(IIdent $ident): string 
	{
		$middlewareParsers = $this->setup->getMiddlewareParsers($ident);
		
		$callback = function() use ($ident) 
		{
			return $this->getMainString($ident);
		};
		
		foreach ($middlewareParsers as $middlewareParser)
		{
			$callback = function() use ($callback, $middlewareParser, $ident)
			{
				return $middlewareParser->parse($ident, $callback);
			};
		}
		
		return $callback();
	}
	
	private function getMainString(IIdent $ident): string 
	{
		$parsers = $this->setup->getParsers($ident);
		
		foreach ($parsers as $parser)
		{
			$result = $parser->parse($ident);
			
			if (!is_null($result))
				return $result;
		}
		
		throw new \Exception("Parser for Ident of type " . get_class($ident) . " was not found");
	}
	
	
	public function __construct()
	{
		$this->setup = new ParsersCollection();
	}
	
	
	public function getSetup(): IParserSetup
	{
		return $this->setup;
	}
	
	/**
	 * @param IIdent[] $idents
	 * @return string
	 */
	public function parse(array $idents): string
	{
		$result = [];
		
		foreach ($idents as $ident)
		{
			$result[] = $this->parseIdent($ident);
		}
		
		return implode('', $result);
	}
}