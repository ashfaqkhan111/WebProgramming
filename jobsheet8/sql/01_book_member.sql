create table if not exists books (
    id serial primary key,
    title varchar(255),
    author varchar(255),
    year int not null,
    isbn varchar(50),
    stock int not null default 0,
    category varchar(50)
);
create table if not exists member (
    id serial primary key,
    name varchar(255)not null,
    member_number varchar(50) not null unique,
    address varchar(255),
    phone_number varchar(30)
);