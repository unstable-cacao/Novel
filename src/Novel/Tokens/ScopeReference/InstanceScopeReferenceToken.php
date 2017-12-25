<?php
namespace Novel\Tokens\ScopeReference;


use Novel\Core\Tokens\ScopeReference\IInstanceScopeReferenceToken;
use Novel\Tokens\Operators\InstanceResolutionOperatorToken;


class InstanceScopeReferenceToken extends AbstractScopeReferenceToken implements IInstanceScopeReferenceToken
{
	public function __construct()
	{
		parent::__construct(new InstanceResolutionOperatorToken());
	}
}