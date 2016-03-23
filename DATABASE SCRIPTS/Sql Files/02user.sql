INSERT INTO `user` (`user_id`, `user_type`, `fname`, `lname`, `address`, `city`, `state`, `zipcode`, `phone`, `email_id`, `gender`, `dob`) VALUES
(1, 'A', 'Alaistar', 'Cook', '9233 Grove Ln 1932', 'Charlotte', 'NC', 95831, 704756756, 'admin1@uncc.edu', 'M', '1988-11-12');

insert into user values(010, 'Bill', 'Administorperson', '111 Business Ave', 'Charlotte', 'NC', 28021, 7045555555,
		'bill@dbmanager.com', 'M', '1954-03-23', 'A');

update user set phone = '7045555555' where user_id = 010; 

insert into user values(011, 'John', 'Administorperson', '212 Business Ave', 'Charlotte', 'NC', 28021, 9805555555,
		'john@dbmanager.com', 'M', '1954-03-23', 'A');

update user set email_id = 'John@dbmanager.com' where user_id = 011;

insert into user values(012, 'Jon', 'Administorperson', '212 University Ave', 'Charlotte', 'NC', 28821, 9805555545,
		'jon@dbmanager.com', 'M', '1957-03-23', 'A');

delete from user where user_id = 12;		

insert into user values(007, 'Barak', 'Obama', '111 Us Road', 'Washinton', 'DC', 10000, 0010010001,
		'obama@whitehouse.com', 'M', '1990-01-01', 'A');
		
insert into user values(008, 'Elephent', 'Woods', '123 Horse Blvd', 'Tempe', 'AZ', 12321, 9990003456,
		'bigguy@funny.com', 'M', '1944-01-21', 'A');

		
insert into user values(002, 'Kim', 'Kardashian', '456 Hollywood Blvd', 'Los Angeles', 'CA', 90078, 9009999015, 
		'kimisgreat@kim.com', 'F', '1975-04-12', 'S');
        
update user set phone = '9009999015' where user_id=002; 

insert into user values(003, 'Bill', 'Gates', '123 Microsoft Way', 'Redmond', 'WA', 98052, 4258828085,
		'bill@microsoft.com', 'M', '1954-06-22', 'S');
        
insert into user values(004, 'Jimmy', 'Apple', '444 Shady Acres', 'Charlotte', 'NC', 28201, 7045551215,
		'jimmy@mymail.com', 'M', '1988-01-03', 'S');
        
insert into user values(005, 'John', 'Doe', '123 Generic Road', 'Charlotte', 'NC', 28201, 7045551212,
		'john@genericemail.com', 'M', '1991-12-21', 'S');
        
insert into user values(006, 'Jerry', 'Bush', '213 Grove Road', 'Phoenix', 'AZ', 28110, 4803494821,
		'jerrybush@gmail.com', 'M','1988-11-21', 'S');
        
       
insert into user values(009, 'Catty', 'Dood', '444 Mouse Road', 'Green', 'SC', 12221, 4889940012,
		'catty@gmail.com', 'F', '1990-10-22', 'B');

INSERT INTO user VALUES
(033, 'Bill', 'Lumbergh', '4313 Initech Circle', 'Charlotte', 'NC', 28201, 7045551212,
	'bill@initech.com', 'M', '1965-04-22', 'B');

INSERT INTO user VALUES
(034, 'Dom', 'Portwood', '4313 Initech Circle', 'Charlotte', 'NC', 28201, 7045551212,
	'dom@initech.com', 'M', '1961-01-17', 'B');

INSERT INTO user VALUES
(035, 'Bob', 'Slydell', '801 Maple Street', 'Charlotte', 'NC', 28209, 7048881414,
	'bob.slydell@consultingfirm.com', 'M', '1988-05-18', 'B');

INSERT INTO user VALUES
(036, 'Bob', 'Porter', '801 Maple Street', 'Charlotte', 'NC', 28209, 7048881414,
	'bob.porter@consultingfirm.com', 'M', '1975-09-12', 'B');

INSERT INTO user VALUES
(037, 'Tom', 'Smykowski', '1635 New Oak Lane', 'Huntersville', 'NC', 28078, 9806661234,
	't.smykowski@gmail.com', 'M', '1984-03-21', 'B');

INSERT INTO user VALUES
(038, 'Samir', 'Nagheenanajar', '4313 Electrode Road', 'Charlotte', 'NC', 28282, 7049994316,
	'snagheen@initrode.com', 'M', '1977-11-30', 'B');

INSERT INTO user VALUES
(039, 'Michael', 'Bolton', '4313 Electrode Road', 'Charlotte', 'NC', 28282, 7049994316,
	'mbolton@initrode.com', 'M', '1955-12-06', 'B');

INSERT INTO user VALUES
(040, 'Peter', 'Gibbons', '20000 Norman Colony Road', 'Cornelius', 'NC', 28031, 7045555555,
	'pgibbons76@gmail.com', 'M', '1981-08-17', 'B');

INSERT INTO user VALUES
(041, 'Milton', 'Waddams', '4313 Initech Circle', 'Charlotte', 'NC', 28201, 7045551212,
	'milton@initech.com', 'M', '1969-08-13', 'B');

INSERT INTO user VALUES
(042, 'Rob', 'Newhouse', '6943 E. Pecan Ave', 'Charlotte', 'NC', 28211, 7041116523,
	'newhouse@starconsulting.com', 'M', '1954-06-12', 'B');