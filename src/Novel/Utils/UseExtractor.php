<?php
namespace Novel\Utils;


class UseExtractor
{
	public static function extract(string $fullPath): array 
	{
		$content = file_get_contents($fullPath);
		$tokens = token_get_all($content);
		
		$result = [];
		$namespace = [];
		$saveNextToken = false;
		$insideClass = false;
		$openCurlyBrackets = 0;
		$closeCurlyBrackets = 0;
		
		foreach ($tokens as $token) 
		{
			if (is_array($token))
			{
			    if ($token[0] == T_NAMESPACE || ($token[0] == T_USE && !$insideClass))
                {
                    $saveNextToken = true;
                }
                else if ($token[0] == T_CLASS)
                {
                    $insideClass = true;
                }
                else if ($saveNextToken)
                {
                    $namespace[] = $token[1];
                }
			}
			else if ($namespace && $token == ';')
            {
                $saveNextToken = false;
                $result[] = trim(implode('', $namespace));
                $namespace = [];
            }
            else if ($token == '{')
            {
                $openCurlyBrackets++;
            }
            else if ($token == '}')
            {
                $closeCurlyBrackets++;
            }
            
            if ($openCurlyBrackets && $insideClass && $openCurlyBrackets == $closeCurlyBrackets)
            {
                $insideClass = false;
            }
		}
		
		return $result;
	}
}