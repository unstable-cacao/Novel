<?php
namespace Novel\Parsing;


use Novel\Core\ISymbol;
use Novel\Core\Parsing\ISymbolChainParser;
use Novel\Core\Parsing\ISymbolMiddlewareParser;
use Novel\Core\Parsing\ISymbolParser;
use Novel\Core\Parsing\ISymbolParsingObject;
use Novel\Core\Parsing\IParserSetup;


class ParsersCollection implements IParserSetup
{
	/** @var array */
	private $parsers = [];
	
	/** @var array */
	private $chainParsers = [];
	
	/** @var array */
	private $middlewareParsers = [];
	
	/** @var array */
	private $parsersByType = [];
	
	/** @var array */
	private $chainParsersByType = [];
	
	/** @var array */
	private $middlewareParsersByType = [];
	
	
	private function addObjectsByType(string $type, array $objects)
	{
		foreach ($objects as $object) 
		{
			if ($object instanceof ISymbolParser)
			{
				if (!key_exists($type, $this->parsersByType))
					$this->parsersByType[$type] = [];
				
				$this->parsersByType[$type][] = $object;
			}
			
			if ($object instanceof ISymbolMiddlewareParser)
			{
				if (!key_exists($type, $this->middlewareParsersByType))
					$this->middlewareParsersByType[$type] = [];
				
				$this->middlewareParsersByType[$type][] = $object;
			}
			
			if ($object instanceof ISymbolChainParser)
			{
				if (!key_exists($type, $this->chainParsersByType))
					$this->chainParsersByType[$type] = [];
				
				$this->chainParsersByType[$type][] = $object;
			}
		}
	}
	
	
	/**
	 * @param ISymbolParsingObject|ISymbolParsingObject[] $object
	 * @return IParserSetup
	 */
	public function add($object): IParserSetup
	{
		if (is_array($object))
		{
			foreach ($object as $item) 
			{
				$this->add($item);
			}
		}
		else
		{
			if ($object instanceof ISymbolParser)
				$this->parsers[] = $object;
			
			if ($object instanceof ISymbolMiddlewareParser)
				$this->middlewareParsers[] = $object;
			
			if ($object instanceof ISymbolChainParser)
				$this->chainParsers[] = $object;
		}
		
		return $this;
	}

	/**
	 * @param string|array $type
	 * @param ISymbolParsingObject|ISymbolParsingObject[] $object
	 * @return IParserSetup
	 */
	public function addByType($type, $object): IParserSetup
	{
		if (is_array($type))
		{
			foreach ($type as $item) 
			{
				if (is_array($object))
					$this->addObjectsByType($item, $object);
				else
					$this->addObjectsByType($item, [$object]);
			}
		}
		else
		{
			if (is_array($object))
					$this->addObjectsByType($type, $object);
				else
					$this->addObjectsByType($type, [$object]);
		}
		
		return $this;
	}
	
	
	/**
	 * @param ISymbol $symbol
	 * @return ISymbolParser[]
	 */
	public function getParsers(ISymbol $symbol): array
	{
		$result = [];
		$type = get_class($symbol);
		
		if (key_exists($type, $this->parsersByType))
		{
			$result = $this->parsersByType[$type];
		}
		
		$result = array_merge($result, $this->parsers);
		
		return $result;
	}
	
	
	/**
	 * @param ISymbol $symbol
	 * @return ISymbolMiddlewareParser[]
	 */
	public function getMiddlewareParsers(ISymbol $symbol): array 
	{
		$result = [];
		$type = get_class($symbol);
		
		if (key_exists($type, $this->middlewareParsersByType))
		{
			$result = $this->middlewareParsersByType[$type];
		}
		
		$result = array_merge($result, $this->middlewareParsers);
		
		return $result;
	}
	
	
	/**
	 * @param ISymbol $symbol
	 * @return ISymbolChainParser[]
	 */
	public function getChainParsers(ISymbol $symbol): array 
	{
		$result = [];
		$type = get_class($symbol);
		
		if (key_exists($type, $this->chainParsersByType))
		{
			$result = $this->chainParsersByType[$type];
		}
		
		$result = array_merge($result, $this->chainParsers);
		
		return $result;
	}
}