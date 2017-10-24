<?php
namespace Novel\Core\Tokens\Strings;


use Novel\Core\IToken;


interface IPlainTextToken extends IToken
{
	public function setText(string $text): void;
	public function text(): string;
}
