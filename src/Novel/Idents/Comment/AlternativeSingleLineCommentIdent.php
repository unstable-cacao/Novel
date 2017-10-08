<?php
namespace Novel\Idents\Comment;


use Novel\Consts\Idents\CommentNames;
use Novel\Core\IIdent;


class AlternativeSingleLineCommentIdent implements IIdent
{
	public function name()
	{
		return CommentNames::ALTERNATIVE_COMMENT;
	}
}