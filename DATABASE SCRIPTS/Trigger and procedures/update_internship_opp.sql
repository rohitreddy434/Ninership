CREATE DEFINER=`root`@`localhost` PROCEDURE `update_internship_opp`(IN `action` CHAR(1), IN `description` VARCHAR(100), IN `title` VARCHAR(20), IN `pay` DECIMAL, IN `start_date` DATE, IN `end_date` DATE, IN `hours_req` INT(10), IN `location` VARCHAR(50), IN `no_of_positions` INT(3), IN `p_internship_id` INT(11), IN `p_supervisor_id` INT(11), IN `p_business_id` INT(11), OUT `pout` INT(1))
    NO SQL
BEGIN
set pout=0;

if(action = 'I') then
INSERT INTO internship_opportunities(job_description, job_title, pay,start_date, end_date, weekly_hours_req, location, post_date, no_of_positions, user_id,business_id) VALUES (description,title, pay, start_date, end_date, hours_req, location,CURDATE(), no_of_positions,p_supervisor_id,p_business_id);
select max(internship_id) into pout from internship_opportunities ;
elseif(action ='D') then
	
	update internship_opportunities set is_deleted='Y' WHERE internship_id= p_internship_id;
elseif(action = 'E') then
UPDATE internship_opportunities 
	SET job_description=description, 
    	job_title=title,
        pay= pay, 
        start_date= start_date,
        end_date= end_date,
        weekly_hours_req= hours_req,
        location= location,
        post_date= CURDATE(), 
        no_of_positions= no_of_positions ,
        user_id = p_supervisor_id,
        business_id = p_business_id
        	
            WHERE internship_id= p_internship_id;
else
	set pout =  -1;
     end if;
     END