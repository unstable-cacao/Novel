<?php
namespace Novel\Tokens\ScopeResolution;


use Novel\Consts\Tokens\ScopeResolutionNames;
use Novel\Core\IToken;
use Novel\Tokens\Base\AbstractToken;
use Novel\Tokens\Base\IScopeResolution;


class StaticScope extends AbstractToken implements IScopeResolution
{
	/** @var IToken */
	private $scopeSource;
	
	/** @var IToken */
	private $scopeTarget;
	
	
	public function __construct(IToken $scopeSource, IToken $scopeTarget)
	{
		parent::__construct(ScopeResolutionNames::STATIC_SCOPE);
		$this->scopeSource = $this->setupChild($scopeSource);
		$this->scopeTarget = $this->setupChild($scopeTarget);
	}
	
	
	public function scopeSource(): IToken
	{
		return $this->scopeSource;
	}
	
	public function scopeTarget(): IToken
	{
		return $this->scopeTarget;
	}
}