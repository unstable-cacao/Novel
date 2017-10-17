<?php
namespace Novel\Stream;


use Novel\Core\IToken;
use Novel\Core\ISymbol;
use Novel\Core\ITreeToken;
use Novel\Core\ITransformMediator;
use Novel\Core\Stream\ITokenTransformStream;


class TokenTransformStream implements ITokenTransformStream
{
	/** @var array */
	private $symbols = [];
	
	/** @var ITransformMediator */
	private $main;
	
	
	public function __construct(ITransformMediator $transformer)
	{
		$this->main = $transformer;
	}
	
	
	/**
	 * @param string|string[]|ISymbol|ISymbol[]|IToken|IToken[] $item
	 * @return ISymbol[]
	 */
	public function push($item): array
	{
		if (is_array($item))
		{
			$results = [];
			
			foreach ($item as $singleItem)
			{
				$results[] = $this->push($singleItem);
			}
			
			return $results ? array_merge(...$results) : $results;
		}
		else if ($item instanceof IToken)
		{
			return $this->transformToken($item);
		}
		else if ($item instanceof ISymbol)
		{
			$this->symbols[] = $item;
			return [$item];
		}
		else if (is_string($item))
		{
			return $this->push(new $item);
		}
		else
		{
			throw new \Exception('Unexpected type');
		}
	}
	
	/**
	 * @param ITreeToken $of
	 * @return ISymbol[]
	 */
	public function transformChildren(ITreeToken $of): array
	{
		$results = [];
		
		foreach ($of->children() as $child)
		{
			$results[] = $this->main->transform($child);
		}
		
		if (!$results)
			return [];
		
		$result = array_merge(...$results);
		$this->symbols = array_merge($this->symbols, $result);
		
		return $result;
	}
	
	/**
	 * @param IToken $token
	 * @return ISymbol[]
	 */
	public function transformToken(IToken $token): array
	{
		$result = $this->main->transform($token);
		$this->symbols = array_merge($this->symbols, $result);
		
		return $result;
	}

	public function count(): int
	{
		return count($this->symbols);
	}

	public function isEmpty(): bool
	{
		return (bool)$this->symbols;
	}

	public function clear(): void
	{
		$this->symbols = [];
	}

	/**
	 * @return ISymbol[]
	 */
	public function getSymbols(): array
	{
		return $this->symbols;
	}
}