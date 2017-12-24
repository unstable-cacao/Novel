<?php
namespace Novel\Transformation\Comments;


use Novel\Core\IToken;
use Novel\Core\Stream\ITokenTransformStream;
use Novel\Core\Tokens\Comments\IOneLineCommentToken;
use Novel\Core\Transforming\ITokenTransform;
use Novel\Symbols\Comment\OneLineCommentSymbol;


class OneLineCommentTransform implements ITokenTransform
{
	public function transform(IToken $token, ITokenTransformStream $stream): void
	{
		if (!($token instanceof IOneLineCommentToken))
			return;
		
		$stream->push(OneLineCommentSymbol::class);
		$stream->push($token->getTextToken());
	}
}