<?php
namespace Novel\Tokens\Strings;


use Novel\Core\Tokens\Strings\IPlainTextToken;
use Novel\Tokens\Base\AbstractChildlessToken;


/**
 * Any generic text that should be printed without any additional parameters.
 * 
 * $a = "hello world";
 *
 * PlainTextToken: 
 * hello world  
 */
class PlainTextToken extends AbstractChildlessToken implements IPlainTextToken
{
	/** @var string|null */
	private $text = null;
	
	
	public function __construct(?string $text = null)
	{
		// TODO:
		parent::__construct('TODO');
	}
	
	
	public function setText(string $text): void
	{
		$this->text = $text;
	}
	
	public function getText(): string
	{
		return $this->text ?: '';
	}
	
	public function getToken(): string
	{
		// TODO: Implement getToken() method.
	}
}