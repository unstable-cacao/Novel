<?php
namespace Novel\Tokens\ScopeReference;


use Novel\Core\Tokens\ScopeReference\IStaticScopeReferenceToken;
use Novel\Tokens\Operators\StaticResolutionOperatorToken;


class StaticScopeReferenceToken extends AbstractScopeReferenceToken implements IStaticScopeReferenceToken
{
	public function __construct()
	{
		parent::__construct(new StaticResolutionOperatorToken());
	}
}