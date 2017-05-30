create or replace TRIGGER delete_command1
            before delete on Build
            for each row
                begin
              update VillageBuildings set building_level = building_level+1
              where village_id = :old.village_id and building_id = :old.building_id;
              update_general_points(:old.village_id,:old.building_id);
              end;
/

CREATE OR REPLACE PROCEDURE update_buildings as
begin
delete from build where end_time<=current_timestamp;
end;
/
CREATE OR REPLACE PROCEDURE update_general_points(p_id int,b_id int) as
actual_level int :=0;
id_user int;
begin
 select user_Id into id_user from villages where village_id=p_id;
 select building_level into actual_level from villagebuildings where village_id=p_id and building_id=b_id;
 if(b_id=1)
 then
  update users set general_points = general_points+(100*actual_level) where user_id=id_user;
  elsif b_id=2
  then
   update users set general_points = general_points+(50*actual_level) where user_id=id_user;
    elsif b_id=3
  then
   update users set general_points = general_points+(75*actual_level) where user_id=id_user;
    elsif b_id=4
  then
   update users set general_points = general_points+(25*actual_level) where user_id=id_user;
    elsif b_id=5
  then
   update users set general_points = general_points+(25*actual_level) where user_id=id_user;
    elsif b_id=6
  then
   update users set general_points = general_points+(25*actual_level) where user_id=id_user;
    elsif b_id=7
  then
   update users set general_points = general_points+(70*actual_level) where user_id=id_user;
   end if;
end;

