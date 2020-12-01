drop table if exists poo_exo.polls;
drop table if exists poo_exo.poll_responses;

create table poo_exo.polls
(
    id        int auto_increment,
    title     text                                 null,
    author_id int                                  null,
    creation  datetime default current_timestamp() not null,
    constraint polls_id_uindex
        unique (id),
    constraint polls_users_id_fk
        foreign key (author_id) references poo_exo.users (id)
);

alter table poo_exo.polls
    add primary key (id);

create table poo_exo.poll_responses
(
    id      int auto_increment
        primary key,
    poll_id int  null,
    content text null,
    votes   int  null,
    constraint poll_responses_polls_id_fk
        foreign key (poll_id) references poo_exo.polls (id)
);

