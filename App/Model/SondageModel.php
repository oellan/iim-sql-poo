<?php

namespace App\Model;

use Core\Database;
use DateTime;

class SondageModel
    extends Database
{

    public function getAll(): array
    {
        return $this->query(
            'SELECT *
FROM `polls` 
INNER JOIN `users` on `polls`.`author_id` = `users`.`id` 
ORDER BY `polls`.`creation` DESC'
        );
    }

    public function getAllById(string $id): array
    {
        return $this->prepare(
            'SELECT *
FROM polls 
INNER JOIN users on polls.author_id = users.id
WHERE polls.author_id = :id
ORDER BY polls.creation DESC',
            ['id' => $id]
        );
    }

    public function getById(int $id): array
    {
        return $this->prepare(
            'SELECT polls.title, users.username, poll_responses.content, poll_responses.votes, poll_responses.id, polls.end_date
FROM poll_responses
         INNER JOIN polls on poll_responses.poll_id = polls.id
         INNER JOIN users on polls.author_id = users.id
WHERE polls.id = :id', ['id' => $id]
        );
    }

    public function getLatest(int $count): array
    {
        return $this->prepare(
            'SELECT polls.title, users.username, polls.creation, polls.end_date
FROM polls
         INNER JOIN users on polls.author_id = users.id
ORDER BY polls.creation DESC
LIMIT :maxPolls',
            [':maxPolls' => $count]
        );
    }

    public function addPoll(string $title, int $authorId, array $responses, DateTime $endTime)
    {
        $id = $this->prepare(
            'INSERT INTO polls(title, author_id, creation, end_date) VALUES (:title,:authorId,NOW(),:endTime) RETURNING id',
            [
                ':title'    => $title,
                ':authorId' => $authorId,
                ':endTime'=>$endTime->format('Y-m-d H:i:s')
            ], true
        );
        if ($id === false) {
            return false;
        }
        $id = $id['id'];
        $query = 'INSERT INTO `poll_responses`(`poll_id`,`content`,`votes`) VALUES ';
        $queryFragment = '';
        for ($i = 0, $iMax = count($responses); $i < $iMax; $i++) {
            $queryFragment .= ",($id,?,0)";
        }
        $query .= substr($queryFragment, 1);
        $this->prepare($query, $responses);
        return $id;
    }

    public function addVote(int $responseId)
    {
        $this->prepare('UPDATE poll_responses SET votes = votes + 1 WHERE id=:id', ['id' => $responseId]);
    }
}