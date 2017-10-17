<?php
namespace Novel\Tokens;


use Novel\Tokens\Base\AbstractTreeToken;


class ParameterListDefinitionToken extends AbstractTreeToken
{
	public function __construct()
	{
		parent::__construct('');
	}
}