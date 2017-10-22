<?php
namespace Novel\Core\Tokens;


interface IUseToken
{
	public function fullName(): string;
	public function getAs(): ?string;
}