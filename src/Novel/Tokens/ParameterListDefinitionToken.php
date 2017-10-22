<?php
namespace Novel\Tokens;


use Novel\Core\Tokens\IParameterListDefinitionToken;
use Novel\Tokens\Base\AbstractTreeToken;


class ParameterListDefinitionToken extends AbstractTreeToken implements IParameterListDefinitionToken
{
	public function __construct()
	{
		parent::__construct('');
	}
}