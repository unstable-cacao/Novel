<?php
namespace Novel;


use Novel\Config\NovelConfig;


class Novel
{
	/** @var TokenTransformer */
	private $transfer;
	
	/** @var ParseMediator */
	private $parser;
	
	
	public function __construct()
	{
		$this->transfer = new TokenTransformer();
		$this->parser = new ParseMediator();
	}
	
	
	public function getConfig(): NovelConfig
	{
		$config =  new NovelConfig();
		$config->ParserConfig = $this->parser->getSetup();
		$config->TransferConfig = $this->transfer->getSetup();
		
		return $config;
	}
}