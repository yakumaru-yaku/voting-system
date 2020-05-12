create database dotinstall_poll_php;
grant all on dotinstall_poll_php.* to dbuser@localhost identified by '0000';
use dotinstall_poll_php
create table answers (
    id int not null auto_increment primary key,
    answer varchar(255),
    remote_addr varchar(15),
    user_agent varchar(255),
    answer_date date,
    created datetime,
    modified datetime,
    unique unique_answer(remote_addr, user_agent, answer_date)
);
select * from answers;
