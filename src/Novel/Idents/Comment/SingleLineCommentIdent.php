<?php
namespace Novel\Idents\Comment;


use Novel\Consts\Idents\CommentNames;
use Novel\Core\IIdent;


class SingleLineCommentIdent implements IIdent
{
	public function name()
	{
		return CommentNames::COMMENT;
	}
}