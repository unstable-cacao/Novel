<?php
namespace Novel\Tokens\ScopeReference;


use Novel\Core\IToken;
use Novel\Core\Tokens\Operators\IOperator;
use Novel\Core\Tokens\ScopeReference\IScopeReferenceToken;
use Novel\Tokens\Base\AbstractToken;


abstract class AbstractScopeReferenceToken extends AbstractToken implements IScopeReferenceToken
{
	private $left;
	private $referenceOperator;
	private $right;
	
	
	public function __construct(IOperator $refOperator)
	{
		$this->referenceOperator = $refOperator;
	}


	public function set(IToken $leftSide, IToken $rightSide): void
	{
		$this->left = $leftSide;
		$this->right = $rightSide;
	}

	public function setLeftSide(IToken $leftSide): void
	{
		$this->left = $leftSide;
	}

	public function setRightSide(IToken $rightSide): void
	{
		$this->left = $rightSide;
	}

	public function getLeftSide(): IToken
	{
		return $this->left;
	}

	public function getRightSide(): IToken
	{
		return $this->right;
	}

	public function count(): int
	{
		return 3;
	}

	/**
	 * @return IToken[]
	 */
	public function children(): array
	{
		return [
			$this->left,
			$this->referenceOperator,
			$this->right
		];
	}
}