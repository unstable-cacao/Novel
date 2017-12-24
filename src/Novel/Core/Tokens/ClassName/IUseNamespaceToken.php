<?php
namespace Novel\Core\Tokens\ClassName;


use Novel\Core\Tokens\INameToken;


interface IUseNamespaceToken extends IClassNameToken
{
	/**
	 * @param string|INameToken $as
	 */
	public function setAs($as): void;
	
	public function getAs(): ?string;
	public function getAsToken(): ?INameToken;
	public function hasAs(): bool;
}