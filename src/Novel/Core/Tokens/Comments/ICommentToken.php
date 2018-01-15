<?php
namespace Novel\Core\Tokens\Comments;


use Novel\Core\Tokens\Abstraction\Statements\ICommentStatementToken;
use Novel\Core\Tokens\Strings\IPlainTextToken;


interface ICommentToken extends ICommentStatementToken
{
	public function getText(): string;
	public function getTextToken(): IPlainTextToken;
	public function setText(string $text): void;
	public function setTextToken(IPlainTextToken $token): void;
}