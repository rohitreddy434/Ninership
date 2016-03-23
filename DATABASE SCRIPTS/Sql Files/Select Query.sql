-- Query No: 1 List of all internship opportunities for a particular period of time showing whether the opportunity is filled or not.

select internship_id,job_description,job_title, pay, location, weekly_hours_req, no_of_positions from internship_opportunities where start_date >= '2015-01-01' and end_date <= '2015-05-10';

-- Query No:2: List of only the placements for a particular period of time-showing job and student information.

SELECT placement.student_id, student.major, student.student_level, student.expected_grad_date, student.gpa, placement.internship_id, internship_opportunities.job_description,internship_opportunities.job_title, internship_opportunities.pay, internship_opportunities.location, internship_opportunities.weekly_hours_req FROM placement JOIN internship_opportunities ON(placement.internship_id=internship_opportunities.internship_id) 
JOIN student ON placement.student_id=student.student_id WHERE placement.start_date >= '2015-01-01' AND placement.end_date <= '2015-05-10';


-- Query No 3: ist of students by a particular skill
select fname, lname, student_id, major, student_level, gpa from user join student using(user_id) where student_id in (
select student_id from student_skill where skill_id in (
select skill_id from skills where skill_name like '%Java%'));



-- Query No:4 list of placement details with the information about whether evaluation has been turned in for that

SELECT placement.internship_id, internship_opportunities.job_description,internship_opportunities.job_title,placement.student_id,internship_opportunities.user_id,placement.student_eval,placement.supervisor_eval FROM `placement`INNER JOIN internship_opportunities WHERE placement.internship_id=internship_opportunities.internship_id;


-- Query No: 5 find student id and the number of weekly work hours for the placed student
select student_id, sum(weekly_hours_req) from internship_opportunities io join placement p on p.internship_id = io.internship_id group by student_id;

