<?php
namespace Novel;


use Novel\Config\NovelConfig;
use Novel\Core\IToken;
use Novel\FileSystem\FileWriter;


class Novel
{
	/** @var TransformMediator */
	private $transfer;
	
	/** @var ParseMediator */
	private $parser;
	
	
	public function __construct()
	{
		$this->transfer = new TransformMediator();
		$this->parser = new ParseMediator();
	}
	
	
	public function getConfig(): NovelConfig
	{
		$config = new NovelConfig();
		$config->ParserConfig = $this->parser->getSetup();
		$config->TransferConfig = $this->transfer->getSetup();
		
		return $config;
	}
	
	public function stringify(IToken $root): string
	{
		$symbols = $this->transfer->transform($root);
		return $this->parser->parse($symbols);
	}
	
	public function write(string $fullPath, IToken $root): void
	{
		$code = $this->stringify($root);
		FileWriter::write($fullPath, $code);
	}
}