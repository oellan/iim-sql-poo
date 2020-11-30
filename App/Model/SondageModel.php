<?php

namespace App\Model;

use Core\Database;

class SondageModel
    extends Database
{

    public function getAll(): array
    {
        return $this->query(
            'SELECT polls.title, users.username, polls.creation 
FROM polls 
INNER JOIN users on polls.author_id = users.id 
ORDER BY polls.creation DESC'
        );
    }

    public function getAllForUsername(string $username): array
    {
        return $this->prepare(
            'SELECT polls.title, users.username, polls.creation 
FROM polls 
INNER JOIN users on polls.author_id = users.id
WHERE polls.username = :username
ORDER BY polls.creation DESC',
            [':username' => $username]
        );
    }

    public function getById(int $id): array
    {
        return $this->prepare(
            'SELECT polls.title, users.username, poll_responses.content, poll_responses.votes
FROM poll_responses
         INNER JOIN polls on poll_responses.poll_id = polls.id
         INNER JOIN users on polls.author_id = users.id
WHERE polls.id = :id', ['id' => $id]
        )[0];
    }

    public function getLatest(int $count): array
    {
        return $this->prepare(
            'SELECT polls.title, users.username, polls.creation
FROM polls
         INNER JOIN users on polls.author_id = users.id
ORDER BY polls.creation DESC
LIMIT :maxPolls',
            [':maxPolls' => $count]
        );
    }
}