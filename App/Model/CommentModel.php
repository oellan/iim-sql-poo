<?php

namespace App\Model;

use Core\Database;

class CommentModel
    extends Database
{

    public function addComment(int $authorId, int $pollId, string $content)
    {
        $this->prepare(
            'INSERT INTO `comments`(`author_id`, `content`, `poll_id`) VALUES (?,?,?)',
            [
                $authorId,
                $content,
                $pollId,
            ]
        );
    }

    public function getCommentsOfPoll(int $pollId)
    {
        return $this->prepare(
            'SELECT `comments`.`content`, `users`.`username` 
FROM `comments` 
    INNER JOIN `users` ON `comments`.`author_id` = `users`.`id`
WHERE `poll_id` = ?',
            [$pollId]
        );
    }
}