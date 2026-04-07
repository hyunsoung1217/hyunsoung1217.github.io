create database amusementpark;
use amusementpark;
create table users(
    Date            char(32)       not null primary key,
    Name            char(32)       character set utf8,
    EnterChild      int(3),
    EnterAdult      int(3),
    Big3Child       int(3),
    Big3Adult       int(3),
    FreeChild       int(3),
    FreeAdult       int(3),
    YearChild       int(3),
    YearAdult       int(3)
);
describe users;