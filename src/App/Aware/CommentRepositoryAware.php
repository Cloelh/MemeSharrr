<?php

namespace App\Aware;

use App\Repository\CommentRepository;

interface CommentRepositoryAware
{
    public function provideCommentRepository(CommentRepository $commentRepository);
}
