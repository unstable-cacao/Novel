<?php
namespace Novel\Tokens\Strings;


use Novel\Core\Tokens\Strings\IPlainTextToken;
use Novel\Tokens\Base\AbstractChildlessToken;


class PlainTextToken extends AbstractChildlessToken implements IPlainTextToken
{
	/** @var string */
	private $text;
	
	
	public function __construct(string $text)
	{
		$this->text = $text;
	}
	
	
	public function setText(string $text): void
	{
		$this->text = $text;
	}
	
	public function text(): string
	{
		return $this->text;
	}
}