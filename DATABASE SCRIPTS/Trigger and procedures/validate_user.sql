CREATE PROCEDURE `validate_user`(IN pin_Email varchar(50), IN pin_pwd varchar(50),
								  OUT po_is_valid_user boolean, OUT po_user_type char(1), OUT po_user_id int)
BEGIN
	declare user_count int;
    select count(1) into user_count from login l join user u where l.login_id = u.user_id and l.email = pin_email and l.pw = pin_pwd;
    	
    set po_is_valid_user = false;
    
    if(user_count = 1) then
		set po_is_valid_user=true;
		SELECT user_type, user_id INTO po_user_type, po_user_id FROM user WHERE email_id = pin_email;
	end if;

END;