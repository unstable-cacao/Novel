<?php
namespace Novel\Idents\Comment;


use Novel\Consts\Idents\CommentNames;
use Novel\Core\IIdent;


class MultiLineCommentOpenIdent implements IIdent
{
	public function name()
	{
		return CommentNames::MULTI_LINE_OPEN;
	}
}