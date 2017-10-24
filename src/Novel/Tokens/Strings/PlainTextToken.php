<?php
namespace Novel\Tokens\Strings;


use Novel\Core\IToken;
use Novel\Core\Tokens\Strings\IPlainTextToken;
use Novel\Tokens\Base\AbstractToken;


class PlainTextToken extends AbstractToken implements IPlainTextToken
{
	/** @var string */
	private $text;
	
	
	public function setText(string $text): void
	{
		$this->text = $text;
	}
	
	public function getToken(): string
	{
		return $this->text;
	}
	
	public function count(): int
	{
		return 1;
	}
	
	public function hasChildren(): bool
	{
		return true;
	}
	
	/**
	 * @return IToken[]
	 */
	public function children(): array
	{
		return [$this->text];
	}
}