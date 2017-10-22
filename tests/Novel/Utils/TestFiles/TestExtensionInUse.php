<?php
namespace Novel\Utils\TestFiles;


use Novel\Core\IToken;
use Traversable;


class TestExtensionInUse implements IToken
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