<?php
namespace Novel\Core\Tokens\Reference;


use Novel\Core\Tokens\Generic\ICallableReferenceToken;
use Novel\Core\Tokens\Generic\IVariableReferenceToken;


interface ILocalVariableReference extends IVariableReferenceToken, ICallableReferenceToken
{

}