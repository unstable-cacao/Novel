<?php
namespace Novel\Core\Tokens\OOP;


use Novel\Core\Tokens\INamedToken;
use Novel\Core\Tokens\Statements\IDefinitionStatementToken;


interface IOODefinitionToken extends 
	IDefinitionStatementToken,
	INamedToken
{

}