create index internship_opportunities_date_index
on internship_opportunities (start_date, end_date);

create index placement_int_id_index
on placement (internship_id);

create index internship_opportunities_int_id_index
on internship_opportunities (internship_id);

create index placement_date_index
on placement (start_date, end_date);

create index skills_skill_id_index
on skills (skill_name);

create index student_skill_skill_id_index
on student_skill (skill_id);
