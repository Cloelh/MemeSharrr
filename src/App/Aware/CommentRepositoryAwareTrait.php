<?php

namespace App\Aware;

use App\Repository\CommentRepository;

trait CommentRepositoryAwareTrait
{
    private ?CommentRepository $commentRepository = null;

    public function provideCommentRepository(CommentRepository $commentRepository) {
        $this->commentRepository = $commentRepository;
    }

}
