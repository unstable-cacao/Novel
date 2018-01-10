<?php
namespace Novel\Tokens\Strings;


use Novel\Core\IToken;
use Novel\Core\Tokens\Generic\IVariableReferenceToken;
use Novel\Core\Tokens\Strings\IInStringExpressionToken;
use Novel\Core\Tokens\Strings\IPlainTextToken;
use Novel\Core\Tokens\Strings\IStringExpressionToken;
use Novel\Tokens\Base\AbstractToken;
use Novel\Tokens\Reference\NamedVariableToken;


abstract class AbstractExpressionStringToken extends AbstractToken implements IStringExpressionToken
{
	/** @var IToken[] */
	private $children = [];
	
	
	public function __construct(?string $string = null)
	{
		if ($string)
			$this->add($string);
	}
	
	
	/**
	 * @param string|string[]|IToken|IToken[] $token
	 */
	public function add($token)
	{
		if (is_array($token))
		{
			foreach ($token as $item) 
			{
				$this->add($item);
			}
			
			return;
		}
		else if (is_string($token))
		{
			$token = new PlainTextToken($token);
		}
		else if (!(
			$token instanceof IPlainTextToken || 
			$token instanceof IInStringExpressionToken || 
			$token instanceof IVariableReferenceToken
		))
		{
			throw new \Exception('Item must be string, IPlainTextToken, IInStringExpressionToken, IVariableReferenceToken or array of the above');
		}
		
		$token->setParent($this);
		$this->children[] = $token;
	}
	
	public function addText(string $plain): IStringExpressionToken
	{
		$this->add($plain);
		return $this;
	}
	
	public function addVariableReference(IVariableReferenceToken $token): IStringExpressionToken
	{
		$this->add($token);
		return $this;
	}
	
	public function addInStringExpression(IInStringExpressionToken $expression): IStringExpressionToken
	{
		$this->add($expression);
		return $this;
	}
	
	public function appendVariableReference(): IVariableReferenceToken
	{
		$token = new NamedVariableToken();
		$token->setParent($this);
		$this->children[] = $token;
		
		return $token;
	}
	
	public function appendInStringExpression(): IInStringExpressionToken
	{
		$token = new InStringExpressionToken();
		$token->setParent($this);
		$this->children[] = $token;
		
		return $token;
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