<?php
namespace Novel\Tokens\ClassName;


use Novel\Core\Tokens\INameToken;
use Novel\Core\Tokens\ClassName\IClassNameToken;

use Novel\Tokens\Named\NameToken;
use Novel\Tokens\Base\AbstractToken;


abstract class AbstractClassNameToken extends AbstractToken implements IClassNameToken
{
	private $parts = [];
	private $partTokens = [];
	private $namespace = '';
	
	
	protected function getPartTokens(): array
	{
		return $this->partTokens;
	}
	

	public function getNamespace(): string
	{
		return $this->namespace;
	}

	/**
	 * @return string[]
	 */
	public function getPartNames(): array
	{
		return $this->parts;
	}

	/**
	 * @param array|string|INameToken|string[]|INameToken[] ...$parts
	 */
	public function addParts(...$parts): void
	{
		$parts = array_filter($parts);
		
		foreach ($parts as $part)
		{
			if (is_array($part))
			{
				$this->addParts(...$part);
				continue;
			}
			
			if (is_string($part))
			{
				if (strpos($part, '\\') !== false)
				{
					$this->addParts(explode($part, '\\'));
					continue;
				}
				
				$part = new NameToken($part);
			}
			
			$this->namespace = ($this->namespace ? '\\' : '') . $part->getName();
			$this->parts[] = [$part->getName()];
			$this->partTokens[] = [$part];
		}
	}
}