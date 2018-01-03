<?php
namespace Novel\Tokens\OOP\Definition;


use Novel\Core\Tokens\INamedToken;
use Novel\Tokens\Named\NameToken;


trait TUseTraitsDefinitionToken
{
	/**
	 * @param string|INamedToken|string[]|INamedToken[] $item
	 */
	public function addTrait(...$item): void
	{
		foreach ($item as $token)
		{
			if (is_array($token))
			{
				foreach ($token as $singleToken)
				{
					$this->addTrait($singleToken);
				}
			}
			else
			{
				if ($token instanceof INamedToken)
				{
					$token = $token->getName();
				}
				
				if (!is_string($token))
					throw new \Exception("Token can be instance of INamedToken, string or array only");
				
				$token = new NameToken($token);
				$token->setParent($this);
				$this->children()[] = $token;
			}
		}
		
		return $this;
	}
}