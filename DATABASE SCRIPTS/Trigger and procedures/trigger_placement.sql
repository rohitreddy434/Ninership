

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



