insert into admin(user_id, dept_id) values(001, 5000);		
insert into admin(user_id, dept_id) values(010, 7000);		
insert into admin(user_id, dept_id) values(007, 8000);		
insert into admin(user_id, dept_id) values(008,9000);		
insert into admin(user_id, dept_id) values(011, 5000);

update admin set dept_id = (select dept_id from department where dept_name ='Computer Science')  where user_id = 1;
