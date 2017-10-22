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
			
			if (count($parts) > 1)
			{
				$lastElement = array_pop($parts);
			}
			else
			{
				$lastElement = $parts[0] ?? [];
			}
			
			if ($lastElement == $element)
			{
				return implode('\\', $parts);
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
				
				switch ($token[0])
				{
					case T_WHITESPACE:
						continue;
					case T_NAMESPACE:
						$saveNamespace = true;
						continue;
					case T_CLASS:
					case T_INTERFACE:
					case T_TRAIT:
						$saveClass = true;
						continue;
					case T_EXTENDS:
					case T_IMPLEMENTS:
						if ($class)
						{
							$fullClassName = $namespace . '\\' . implode('', $class);
							$classesMap[$fullClassName] = [];
							$class = [];
							$lastClass = $fullClassName;
						}
						
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
						continue;
					case T_USE:
						$saveUses = true;
						continue;
					case T_STRING:
					case T_NS_SEPARATOR:
						if ($saveNamespace)
						{
							if (is_string($namespace))
								throw new \Exception("Namespace already set");
							
							$namespace[] = $token[1];
							continue;
						}
						
						if ($saveClass)
						{
							$class[] = $token[1];
							continue;
						}
						
						if ($saveImplements)
						{
							$implement[] = $token[1];
							continue;
						}
						
						if ($saveUses)
						{
							$use[] = $token[1];
							continue;
						}
					
						continue;
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
			}
		}
		
		return $classesMap;
	}
}