<?php
namespace Novel\Symbols\LogicOperator;


use Novel\Consts\Symbols\LogicOperatorNames;
use Novel\Core\ISymbol;
use Novel\Symbols\Base\AbstractSingleStringSymbol;


class QuestionMarkSymbol extends AbstractSingleStringSymbol implements ISymbol
{
	public function __construct()
	{
		parent::__construct("?");
	}
	
	
	public function name()
	{
		return LogicOperatorNames::QUESTION_MARK;
	}
}