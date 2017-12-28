<?php
namespace Novel\Tokens\Strings;


use Novel\Core\Tokens\Strings\INowdocToken;
use Novel\Core\Tokens\Strings\IPlainTextToken;
use Novel\Tokens\Base\AbstractChildlessToken;
use Novel\Tokens\TNamedToken;


class NowdocToken extends AbstractChildlessToken implements INowdocToken
{
	use TNamedToken;
	
	
	/** @var IPlainTextToken */
	private $text;
	
	
	/**
	 * @param string|IPlainTextToken $text
	 */
	public function setText($text): void
	{
		if (is_string($text))
		{
			$text = new PlainTextToken($text);
		}
		
		if (!($text instanceof IPlainTextToken))
			throw new \Exception('Text must be string or IPlainTextToken');
		
		$this->text = $text;
	}
	
	public function getText($text): string
	{
		return $this->text->text();
	}
	
	public function getPlainText(): IPlainTextToken
	{
		return $this->text;
	}
}