<?php
namespace Novel\Transformation\Comments;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\Comments\IMultiLineCommentToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\Comment\MultiLineCommentCloseSymbol;
use Novel\Symbols\Comment\MultiLineCommentOpenSymbol;


class MultiLineCommentTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IMultiLineCommentToken))
			return;
		
		$stream->push(MultiLineCommentOpenSymbol::class);
		$stream->push($token->getTextToken());
		$stream->push(MultiLineCommentCloseSymbol::class);
	}
}