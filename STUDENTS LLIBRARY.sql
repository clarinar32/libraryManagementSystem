create database student_library;
use  student_library; 
create table registration_form
(
student_name char(50) not null,
adm_no int primary key ,
class varchar (10) not null
); 
create table sign_up 
(
    id int auto_increment primary key,
    username varchar(50) not null unique,
    email varchar(100) not null unique,
    user_password varchar (255) not null,
    user_role enum ('student', 'admin') not null
);
create table books
(
book_id int auto_increment primary key,
title varchar(255) not null,
author varchar(100) not null,
category varchar(50) not null,
total_copies int not null,
available_copies int not null
);
insert into books values (001,'web development', 'kaka','science',23,10);
insert into books values (002,'physics', 'dada','science',23,10);
insert into books values (003,'operating systems', 'baba','computer',23,10);
insert into books values (004,'probability', 'paka','math',23,10);
insert into books values (005,'finance', 'sasal','business',23,10);
insert into books values (006,'accounting', 'pascal','math',23,10);
insert into books values (007,'law', 'juma','law',23,10);
insert into books values (008,'commerce', 'otieno','bussiness',23,10);
insert into books values (009,'biology', 'king','science',23,10);
insert into books values (010,'chemisrty', 'bilal','science',23,10);
insert into books values (011,'commmerce', 'otieno','bussiness',23,10);
insert into books values (012,'bioology', 'king','science',23,10);
insert into books values (013,'chemmisrty', 'bilal','science',23,10);
select * from borrowing_form;
create table borrowing_form
(
borrow_id int auto_increment primary key,
adm_no int not null,
book_id int not null,
issue_date date not null,
foreign key (adm_no) references registration_form (adm_no),
foreign key (book_id) references books (book_id)
);

create table returning_form
(
return_id int auto_increment primary key,
adm_no int not null,
book_id int not null,
due_date date not null,
return_date date not null,
foreign key (adm_no) references registration_form (adm_no),
foreign key (book_id) references books (book_id)
);
create view book_status as select r.adm_no, b.book_id, bf.issue_date, rf.due_date, case
		when rf.return_date is null and  rf.due_date >= CURDATE() then  'Not Due'
        when rf.return_date is null and  rf.due_date < CURDATE() then 'Overdue'
        when rf.return_date <= rf.due_date then 'Returned on Time'
        when rf.return_date > rf.due_date then 'Returned Late'
    end as status   
from registration_form r, books b, borrowing_form bf, returning_form rf where r.adm_no=bf.adm_no and r.adm_no=rf.adm_no 
and b.book_id=bf.book_id and b.book_id=rf.book_id;
select * from book_status;

create view ALL_books_borrowed as select b.book_id, b.title, bf.issue_date from books b, borrowing_form bf where b.book_id=bf.book_id;

select * from registration_form;
