<?php
namespace Novel\Tokens\ScopeReference;


use Novel\Core\Tokens\ScopeReference\IInstanceScopeReferenceToken;
use Novel\Tokens\Operators\StaticResolutionOperatorToken;


class StaticScopeReferenceToken extends AbstractScopeReferenceToken implements IInstanceScopeReferenceToken
{
	public function __construct()
	{
		parent::__construct(new StaticResolutionOperatorToken());
	}
}