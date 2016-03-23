Create schema Ninership;

use ninership;


Create table users(
user_id int NOT NULL AUTO_INCREMENT,
fname varchar(20) not null,
lname varchar(20) not null,
address varchar(200),
city varchar(50),
state varchar(50),
zipcode int,
phone int not null,
email_id varchar(50) not null UNIQUE,
gender char(1) not null,
dob date,
user_type char(1),
Primary key (user_id)
);

alter table users change phone phone varchar(10);

rename table users to user;

Create table student(
user_id int,
major varchar(20) not null,
student_level varchar(20) not null,
expected_grad_date date,
gpa decimal (2,2),
work_authorization char(1),
primary key (user_id),
foreign key (user_id) references user(user_id),
check(gpa<=4 and gpa>=0)
);

alter table student add column student_id int unique; 

ALTER TABLE `ninership`.`student` CHANGE COLUMN `gpa` `gpa` decimal(3,2) ;

alter table student add INDEX indx_student_id (student_id);


create table business(
business_id int NOT NULL AUTO_INCREMENT,
business_name varchar(50) not null,
address varchar(200),
city varchar(50),
state varchar(50),
zipcode int,
phone int not null,
email varchar(50) not null,
business_profile varchar(500),
website varchar(200),
business_type varchar(50),
industry varchar(50),
primary key (business_id)
);

alter table business change phone contact_phone varchar(10); 
alter table business change email contact_email varchar(50);
alter table business add column contact_name varchar(50); 
alter table business add column isdelete char(1); 

Create table supervisor(
user_id int,
business_id int,
primary key (user_id),
foreign key (business_id) references business(business_id),
foreign key (user_id) references user(user_id)
);


create table department(
dept_id int NOT NULL AUTO_INCREMENT,
dept_name varchar(50) not null unique,
office_phone int not null,
address varchar(200),
email varchar(50),
primary key (dept_id)
);

alter table department change office_phone office_phone varchar(10);

Create table admin(
user_id int,
dept_id int,
primary key (user_id),
foreign key (user_id) references user(user_id),
foreign key (dept_id) references department(dept_id)
);

alter table admin add column admin_id int unique; 

Create table skills(
skill_id int NOT NULL AUTO_INCREMENT,
skill_name varchar(20) unique not null,
description varchar(50) not null,
primary key (skill_id)
);

Create table student_skill(
skill_id int,
student_id int,
skill_level varchar(20),
primary key(skill_id,student_id),
foreign key (skill_id) references skills(skill_id),
foreign key (student_id) references student(user_id)
);


create table internship_opportunities(
internship_id int NOT NULL AUTO_INCREMENT,
job_description varchar(50),
job_title varchar(50),
business_id int,
user_id int,
pay decimal(2,2),
start_date date,
end_date date,
weekly_hours_req int,
location varchar(50),
post_date date,
no_of_positions int,
primary key (internship_id),
foreign key(business_id) references business(business_id),
foreign key (user_id) references supervisor(user_id)
);

ALTER TABLE `ninership`.`internship_opportunities` cHANGE COLUMN pay pay decimal(6,2);
ALTER TABLE `ninership`.`internship_opportunities` add column is_deleted char(1) default 'N';
create table qualification(
internship_id int,
skill_id int,
dept_id int,
qual_level varchar(20),
primary key(internship_id,skill_id,dept_id),
foreign key(internship_id) references internship_opportunities(internship_id),
foreign key(skill_id) references skills(skill_id),
foreign key(dept_id) references department(dept_id)
);

create table interest(
student_id int,
internship_id int,
applied char(1),
primary key(student_id,internship_id),
foreign key(student_id) references student(user_id),
foreign key(internship_id) references internship_opportunities(internship_id)
);

create table placement(
student_id int,
internship_id int,
start_date date,
end_date date,
student_eval char(1),
supervisor_eval char(1),
primary key(student_id, internship_id),
foreign key(student_id) references student(user_id),
foreign key(internship_id) references internship_opportunities(internship_id)
);

create table admin_internship(
admin_id int,
internship_id int,
primary key (admin_id, internship_id),
foreign key (admin_id) references admin(user_id),
foreign key (internship_id) references internship_opportunities(internship_id)
);

create table student_dept(
student_id int,
dept_id int,
primary key (student_id, dept_id),
foreign key (student_id) references student(user_id),
foreign key (dept_id) references department(dept_id)
);

create table login(
login_id int,
pw varchar(50) not null,
primary key (login_id),
foreign key (login_id) references user(user_id)
);
ALTER TABLE `ninership`.`login` add column email varchar(50);

create table placement_audit(
id int(10) NOT NULL AUTO_INCREMENT,
student_id int NOT NULL,
internship_id int NOT NULL,
start_date date,
end_date date,
student_eval char(1),
supervisor_eval char(1),
changerecord datetime DEFAULT NULL,
action varchar(50) default null,
primary key (id)
);