<?php
namespace Novel\Symbols\Comment;


use Novel\Consts\Symbols\CommentNames;
use Novel\Core\ISymbol;
use Novel\Symbols\Base\AbstractSingleStringSymbol;


class MultiLineCommentOpenSymbol extends AbstractSingleStringSymbol implements ISymbol
{
	public function __construct()
	{
		parent::__construct("/*");
	}
	
	
	public function name()
	{
		return CommentNames::MULTI_LINE_OPEN;
	}
}