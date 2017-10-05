<?php
namespace Novel\Parsing;


use Novel\Core\IIdent;
use Novel\Core\Parsing\IIdentChainParser;
use Novel\Core\Parsing\IIdentMiddlewareParser;
use Novel\Core\Parsing\IIdentParser;
use Novel\Core\Parsing\IIdentParsingObject;
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
			if ($object instanceof IIdentParser)
			{
				if (!key_exists($type, $this->parsersByType))
					$this->parsersByType[$type] = [];
				
				$this->parsersByType[$type][] = $object;
			}
			
			if ($object instanceof IIdentMiddlewareParser)
			{
				if (!key_exists($type, $this->middlewareParsersByType))
					$this->middlewareParsersByType[$type] = [];
				
				$this->middlewareParsersByType[$type][] = $object;
			}
			
			if ($object instanceof IIdentChainParser)
			{
				if (!key_exists($type, $this->chainParsersByType))
					$this->chainParsersByType[$type] = [];
				
				$this->chainParsersByType[$type][] = $object;
			}
		}
	}
	
	
	/**
	 * @param IIdentParsingObject|IIdentParsingObject[] $object
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
			if ($object instanceof IIdentParser)
				$this->parsers[] = $object;
			
			if ($object instanceof IIdentMiddlewareParser)
				$this->middlewareParsers[] = $object;
			
			if ($object instanceof IIdentChainParser)
				$this->chainParsers[] = $object;
		}
		
		return $this;
	}

	/**
	 * @param string|array $type
	 * @param IIdentParsingObject|IIdentParsingObject[] $object
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
	 * @param IIdent $ident
	 * @return IIdentParser[]
	 */
	public function getParsers(IIdent $ident): array
	{
		$result = [];
		$type = get_class($ident);
		
		if (key_exists($type, $this->parsersByType))
		{
			$result = $this->parsersByType[$type];
		}
		
		$result = array_merge($result, $this->parsers);
		
		return $result;
	}
	
	
	/**
	 * @param IIdent $ident
	 * @return IIdentMiddlewareParser[]
	 */
	public function getMiddlewareParsers(IIdent $ident): array 
	{
		$result = [];
		$type = get_class($ident);
		
		if (key_exists($type, $this->middlewareParsersByType))
		{
			$result = $this->middlewareParsersByType[$type];
		}
		
		$result = array_merge($result, $this->middlewareParsers);
		
		return $result;
	}
	
	
	/**
	 * @param IIdent $ident
	 * @return IIdentChainParser[]
	 */
	public function getChainParsers(IIdent $ident): array 
	{
		$result = [];
		$type = get_class($ident);
		
		if (key_exists($type, $this->chainParsersByType))
		{
			$result = $this->chainParsersByType[$type];
		}
		
		$result = array_merge($result, $this->chainParsers);
		
		return $result;
	}
}