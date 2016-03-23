insert into skills values (01,'SQL','Language Skill');

insert into skills values (02,'JAVA','Language Skill');

insert into skills values (03,'C','Language Skill');

insert into skills values (04,'Data Modelling','Designing Ability');

insert into skills values (05,'MATLAB','Designing Ability');

insert into skills values (06,'Windows','Operating System');

insert into skills values (07,'Communication','General Skill');

insert into skills values (08,'Data interpretation','General Skill');

insert into skills values (09,'Analytical Thinking','General Skill');

insert into skills values (10,'Working in Teams','General Skill');

delete from skills where skill_id = 10;

update skills set skill_name = 'Oracle', description = 'Database' where skill_id = 8;