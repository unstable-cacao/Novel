<?php
namespace Novel\Core\Tokens;


interface INamespaceToken
{
	public function getNamespace(): string;
}