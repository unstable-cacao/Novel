<?php
namespace Novel\Idents\Comment;


use Novel\Consts\Idents\CommentNames;
use Novel\Core\IIdent;
use Novel\Idents\Base\AbstractSingleStringIdent;


class AlternativeSingleLineCommentIdent extends AbstractSingleStringIdent implements IIdent
{
	public function __construct()
	{
		parent::__construct("#");
	}
	
	
	public function name()
	{
		return CommentNames::ALTERNATIVE_COMMENT;
	}
}