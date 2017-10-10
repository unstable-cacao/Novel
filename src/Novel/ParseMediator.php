<?php
namespace Novel;


use Novel\Core\ISymbol;
use Novel\Core\IParseMediator;
use Novel\Core\Parsing\IParserSetup;
use Novel\Parsing\ParsersCollection;


class ParseMediator implements IParseMediator
{
	/** @var ParsersCollection */
	private $setup;
	
	
	private function parseSymbol(ISymbol $symbol): string 
	{
		return $this->getPreString($symbol) .
			$this->executeMiddleware($symbol) .
			$this->getPostString($symbol);
	}
	
	private function getPreString(ISymbol $symbol): string 
	{
		$chainParsers = $this->setup->getChainParsers($symbol);
		$result = '';
		
		foreach ($chainParsers as $chainParser)
		{
			$res = $chainParser->preParse($symbol);
			
			if (!is_null($res))
				$result .= $res;
		}
		
		return $result;
	}
	
	private function getPostString(ISymbol $symbol): string 
	{
		$chainParsers = $this->setup->getChainParsers($symbol);
		$result = '';
		
		foreach ($chainParsers as $chainParser)
		{
			$res = $chainParser->postParse($symbol);
			
			if (!is_null($res))
				$result .= $res;
		}
		
		return $result;
	}
	
	private function executeMiddleware(ISymbol $symbol): string 
	{
		$middlewareParsers = $this->setup->getMiddlewareParsers($symbol);
		
		$callback = function() use ($symbol) 
		{
			return $this->getMainString($symbol);
		};
		
		foreach ($middlewareParsers as $middlewareParser)
		{
			$callback = function() use ($callback, $middlewareParser, $symbol)
			{
				return $middlewareParser->parse($symbol, $callback);
			};
		}
		
		return $callback();
	}
	
	private function getMainString(ISymbol $symbol): string 
	{
		$parsers = $this->setup->getParsers($symbol);
		
		foreach ($parsers as $parser)
		{
			$result = $parser->parse($symbol);
			
			if (!is_null($result))
				return $result;
		}
		
		throw new \Exception("Parser for Symbol of type " . get_class($symbol) . " was not found");
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
	 * @param ISymbol[] $symbols
	 * @return string
	 */
	public function parse(array $symbols): string
	{
		$result = [];
		
		foreach ($symbols as $symbol)
		{
			$result[] = $this->parseSymbol($symbol);
		}
		
		return implode('', $result);
	}
}