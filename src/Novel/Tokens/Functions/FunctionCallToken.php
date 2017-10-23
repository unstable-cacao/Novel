<?php
namespace Novel\Tokens\Functions;


use Novel\Core\IToken;
use Novel\Core\Tokens\Functions\IFunctionCallToken;
use Novel\Core\Tokens\Functions\IInvokeParametersListToken;
use Novel\Core\Tokens\Generic\ICallableReferenceToken;
use Novel\Core\Tokens\Generic\IValueExpression;
use Traversable;


class FunctionCallToken implements IFunctionCallToken
{
	/**
	 * Retrieve an external iterator
	 * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
	 * @return Traversable An instance of an object implementing <b>Iterator</b> or
	 * <b>Traversable</b>
	 * @since 5.0.0
	 */
	public function getIterator()
	{
		// TODO: Implement getIterator() method.
	}
	
	
	public function getTarget(): ICallableReferenceToken
	{
		// TODO: Implement getTarget() method.
	}
	
	public function setTarget(ICallableReferenceToken $token): void
	{
		// TODO: Implement setTarget() method.
	}
	
	
	public function getParametersList(): IInvokeParametersListToken
	{
		// TODO: Implement getParametersList() method.
	}
	
	public function setParametersList(IInvokeParametersListToken $token)
	{
		// TODO: Implement setParametersList() method.
	}
	
	
	/**
	 * @param IValueExpression|IValueExpression[] $item
	 * @return mixed
	 */
	public function addParameter($item)
	{
		// TODO: Implement addParameter() method.
	}
	
	
	public function name(): string
	{
		// TODO: Implement name() method.
	}
	
	public function parent(): ?IToken
	{
		// TODO: Implement parent() method.
	}
	
	public function setParent(?IToken $parent): void
	{
		// TODO: Implement setParent() method.
	}
	
	public function count(): int
	{
		// TODO: Implement count() method.
	}
	
	public function hasChildren(): bool
	{
		// TODO: Implement hasChildren() method.
	}
	
	/**
	 * @return IToken[]
	 */
	public function children(): array
	{
		// TODO: Implement children() method.
	}
}