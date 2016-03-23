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

delimiter //
create trigger before_placement_update before update on placement
for each row
begin
	insert into placement_audit
	set action = 'update',student_id=OLD.student_id,internship_id=old.internship_id,start_date=old.start_date,end_date=old.end_date,student_eval=old.student_eval,supervisor_eval=old.supervisor_eval,changerecord=now();
END;//


delimiter //
create trigger before_placement_delete before delete on placement
for each row
begin
	insert into placement_audit
	set action = 'delete',student_id=OLD.student_id,internship_id=old.internship_id,start_date=old.start_date,end_date=old.end_date,student_eval=old.student_eval,supervisor_eval=old.supervisor_eval,changerecord=now();
END;//



