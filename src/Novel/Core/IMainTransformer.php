<?php
namespace Novel\Core;


interface IMainTransformer
{
	/**
	 * @param IToken $root
	 * @return IIdent[]
	 */
	public function transform(IToken $root): array;
}