<?php
namespace Novel\Tokens\Comments;


use Novel\Core\IToken;
use Novel\Core\Tokens\Comments\ICommentToken;
use Novel\Core\Tokens\Strings\IPlainTextToken;
use Novel\Tokens\Base\AbstractSingleChildToken;
use Novel\Tokens\Strings\PlainTextToken;


abstract class AbstractCommentToken extends AbstractSingleChildToken implements ICommentToken
{
	/** @var IPlainTextToken */
	private $plainTextToken;
	
	
	public function __construct(string $text)
	{
		$this->plainTextToken = new PlainTextToken($text);
		$this->plainTextToken->setParent($this);
	}
	
	
	public function getText(): string
	{
		return $this->plainTextToken->text();
	}
	
	public function getTextToken(): IPlainTextToken
	{
		return $this->plainTextToken;
	}
	
	public function setText(string $text): void
	{
		$this->plainTextToken->setText($text);
	}
	
	public function setTextToken(IPlainTextToken $token): void
	{
		$token->setParent($this);
		$this->plainTextToken = $token;
	}
	
	/**
	 * @return IToken[]
	 */
	public function children(): array
	{
		return [$this->plainTextToken];
	}
}