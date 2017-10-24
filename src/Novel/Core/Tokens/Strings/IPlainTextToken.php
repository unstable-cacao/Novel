<?php
namespace Novel\Core\Tokens\Strings;


interface IPlainTextToken
{
	public function setText(string $text): void;
	public function getToken(): string;
}
