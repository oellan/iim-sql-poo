DROP TABLE `comments`;

CREATE TABLE `comments`
(
    `id`        INT AUTO_INCREMENT
        PRIMARY KEY,
    `author_id` INT  NOT NULL,
    `content`   TEXT NOT NULL,
    `poll_id`   INT  NOT NULL,
    CONSTRAINT `table_name_polls_id_fk`
        FOREIGN KEY (`poll_id`) REFERENCES `polls` (`id`),
    CONSTRAINT `table_name_users_id_fk`
        FOREIGN KEY (`author_id`) REFERENCES `users` (`id`)
);
