CREATE DEFINER=`root`@`localhost` PROCEDURE `AddPlacement`(IN studentemail varchar(50), IN internshipId int, IN startDate varchar(10), IN endDate varchar(10), IN studentEval char(1), IN supervisorEval char(1), OUT status int)
BEGIN
	declare maxWorkHours int;
    declare currentHrs int;
    declare totalHrs int;
    declare userCount int;
    declare studentId int;
    
    set studentId = 0;
    select user_id into studentId from user where email_id = studentemail limit 1;
    
    set status = 2;
    if studentId <= 0 then
		set status = 1;
    end if;
    
    if status = 2 then
		select max(weekly_hours_req) into maxWorkHours from internship_opportunities io join placement p where p.internship_id = io.internship_id and p.student_id = studentId;
		select weekly_hours_req into currentHrs from internship_opportunities where internship_id = internshipId;
    
		set totalHrs = currentHrs + maxWorkHours;
    
		if totalHrs >= 20 then
			set status = 0;
		end if;
    
    end if;
    
    
    if status = 2 then
		select count(1) into userCount from student where user_id = studentId limit 1;
		if userCount <> 1 then
			set status = 1;
		end if;
    end if;
    
    if status = 2 then
		insert into placement values(studentId, internshipId, startDate, endDate, studentEval, supervisorEval);
        set status = 2;
    end if;
END