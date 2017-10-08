<?php
namespace Novel\Idents\Comment;


use Novel\Consts\Idents\CommentNames;
use Novel\Core\IIdent;


class MultiLineCommentCloseIdent implements IIdent
{
	public function name()
	{
		return CommentNames::MULTI_LINE_CLOSE;
	}
}