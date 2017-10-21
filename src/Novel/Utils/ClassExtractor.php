<?php
namespace Novel\Utils;


class ClassExtractor
{
	private static function findFullName(array $implement, array $useMap, string $namespace): string
	{
		if ($implement[0] == '\\')
		{
			$fullImplement = implode('', $implement);
		}
		else
		{
			$pos = array_search('\\', $implement);
			$inUse = null;
			
			if ($pos !== false)
			{
				$firstElement = implode('', array_slice($implement, 0, $pos));
				$inUse = self::findInUseMap($useMap, $firstElement);
			}
			else
			{
				$element = implode('', $implement);
				$inUse = self::findInUseMap($useMap, $element);
			}
			
			if ($inUse)
			{
				$fullImplement = $inUse . '\\' . implode('', $implement);
			}
			else
			{
				$fullImplement = $namespace . '\\' . implode('', $implement);
			}
		}
		
		return $fullImplement;
	}
	
	private static function findInUseMap(array $useMap, string $element): ?string
	{
		foreach ($useMap as $usePath)
		{
			$parts = explode('\\', $usePath);
			$lastElement = $parts[count($parts) - 1];
			
			if ($lastElement == $element)
			{
				return $usePath;
			}
		}
		
		return null;
	}
	
	
	public static function extract(string $fullPath): array 
	{
		$content = file_get_contents($fullPath);
		$tokens = token_get_all($content);
		
		$class = [];
		$use = [];
		$namespace = [];
		$classesMap = [];
		$useMap = [];
		$implement = [];
		$lastClass = null;
		$saveNamespace = false;
		$saveClass = false;
		$saveImplements = false;
		$saveUses = false;
		
		foreach ($tokens as $token)
		{
			if (is_array($token))
			{
				if ($token[0] == T_WHITESPACE)
					continue;
				
				if ($saveNamespace && $token[1])
				{
					if (is_string($namespace))
						throw new \Exception("Namespace already set");
					
					$namespace[] = $token[1];
					continue;
				}
				
				if ($saveClass && $token[1])
				{
					$class[] = $token[1];
					continue;
				}
				
				if ($saveImplements && $token[1])
				{
					$implement[] = $token[1];
					continue;
				}
				
				if ($saveUses && trim($token[1]))
				{
					$use[] = $token[1];
					continue;
				}
				
				if ($token[0] == T_NAMESPACE)
				{
					$saveNamespace = true;
				}
				else if ($token[0] == T_CLASS || $token[0] == T_INTERFACE || $token[0] == T_TRAIT)
				{
					$saveClass = true;
				}
				else if ($token[0] == T_EXTENDS || $token[0] == T_IMPLEMENTS)
				{
					if ($saveImplements && $implement)
					{
						$classesMap[$lastClass][] = self::findFullName($implement, $useMap, $namespace);
						$implement = [];
					}
					else
					{
						$saveImplements = true;
					}
					
					$saveClass = false;
				}
				else if ($token[0] == T_USE)
				{
					$saveUses = true;
				}
			}
			else 
			{
				if ($token == ';')
				{
					if ($saveNamespace)
					{
						$saveNamespace = false;
						$namespace = implode('', $namespace);
					}
					else if ($saveUses)
					{
						$saveUses = false;
						$useMap[] = implode('', $use);
						$use = [];
					}
				}
				else if ($token == '{')
				{
					$saveClass = false;
					$saveImplements = false;
					
					if ($class)
					{
						$fullClassName = $namespace . '\\' . implode('', $class);
						$classesMap[$fullClassName] = [];
						$class = [];
						$lastClass = $fullClassName;
					}
					
					if ($implement)
					{
						$classesMap[$lastClass][] = self::findFullName($implement, $useMap, $namespace);
						$implement = [];
					}
				}
				else if ($token == ',')
				{
					if ($implement)
					{
						$classesMap[$lastClass][] = self::findFullName($implement, $useMap, $namespace);
						$implement = [];
					}
				}
				else
				{
					if ($saveClass)
					{
						$class[] = $token;
					}
					else if ($saveNamespace)
					{
						if (is_string($namespace))
							throw new \Exception("Namespace already set");
						
						$namespace[] = $token;
					}
					else if ($saveImplements)
					{
						$implement[] = $token;
					}
					else if ($saveUses)
					{
						$use[] = $token;
					}
				}
			}
		}
		
		return $classesMap;
	}
}