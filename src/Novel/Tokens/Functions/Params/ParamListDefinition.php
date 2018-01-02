<?php
namespace Novel\Tokens\Functions\Params;


use Novel\Core\IToken;
use Novel\Core\Tokens\Functions\Params\IParamDefinitionToken;
use Novel\Core\Tokens\Functions\Params\IParamListDefinition;
use Novel\Core\Tokens\Generic\IValueExpressionToken;
use Novel\Core\Tokens\INameToken;
use Novel\Tokens\Base\AbstractToken;


class ParamListDefinition extends AbstractToken implements IParamListDefinition
{
	/** @var IToken[] */
	private $children = [];
	
	
	/**
	 * @param IParamDefinitionToken[]|string[]|INameToken[]|IParamDefinitionToken|string|INameToken $item
	 * @return IParamListDefinition
	 */
	public function add(...$item): IParamListDefinition
	{
		foreach ($item as $token) 
		{
			if (is_array($token))
			{
				foreach ($token as $singleToken) 
				{
					$this->add($singleToken);
				}
			}
			else
			{
				if (!($token instanceof IParamDefinitionToken))
				{
					if (!is_string($token) && !($token instanceof INameToken))
						throw new \Exception("Item must be string, INameToken, IParamDefinitionToken or an array of the above");
					
					$token = new ParamDefinitionToken($token);
				}
				
				$token->setParent($this);
				$this->children[] = $token;
			}
		}
		
		return $this;
	}
	
	/**
	 * @param string|INameToken|null $type
	 * @param string|INameToken $name
	 * @param IValueExpressionToken|null|mixed $defaultValue
	 * @return IParamListDefinition
	 */
	public function addParameter($type, $name, $defaultValue = self::NO_DEFAULT_VALUE): IParamListDefinition
	{
		$param = new ParamDefinitionToken($name, $type, $defaultValue);
		$param->setParent($this);
		$this->children[] = $param;
		
		return $this;
	}
	
	public function count(): int
	{
		return count($this->children);
	}
	
	/**
	 * @return IToken[]
	 */
	public function children(): array
	{
		return $this->children;
	}
}