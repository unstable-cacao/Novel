<?php
namespace Novel\Core\Tokens\Comments;


use Novel\Core\Tokens\Strings\IPlainTextToken;


interface ICommentToken
{
	public function getText(): string;
	public function getTextToken(): IPlainTextToken;
	public function setText(string $text): void;
	public function setTextToken(IPlainTextToken $token): void;
}