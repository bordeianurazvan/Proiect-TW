CREATE OR REPLACE PROCEDURE levelUp_building(p_village_id villages.village_id%type,p_building_id buildings.building_id%type,ok out int) AS                                            
  current_building_level int;
  current_building_cost int;
  current_building_time int;
  available_stone int;
  available_wood int;
  available_iron int;
  timp TIMESTAMP(6);
  
  BEGIN 
        SELECT building_level into current_building_level FROM villagebuildings where village_id = p_village_id and building_id = p_building_id;
        
        SELECT building_cost  into current_building_cost FROM buildings where building_id = p_building_id;
        current_building_cost := current_building_cost*current_building_level;
        
        SELECT building_time into current_building_time FROM buildings where building_id = p_building_id;
        current_building_time := current_building_time*current_building_level;
        
        SELECT resource_number into available_stone FROM villageresources where village_id=p_village_id and resource_id=1;
        SELECT resource_number into available_wood FROM villageresources where village_id=p_village_id and resource_id=2;
        SELECT resource_number into available_iron FROM villageresources where village_id=p_village_id and resource_id=3;
        
        if((available_stone < current_building_cost) or (available_wood < current_building_cost) or (available_iron <current_building_cost))
          then ok := 0;
          else ok :=1 ;
        end if;
        
        if (ok!=0)
          then  update villageresources 
                set resource_number=resource_number-(current_building_cost)
                where resource_id=1 and village_id=p_village_id;
                
                update villageresources 
                set resource_number=resource_number-(current_building_cost)
                where resource_id=2 and village_id=p_village_id;
                
                update villageresources 
                set resource_number=resource_number-(current_building_cost)
                where resource_id=3 and village_id=p_village_id;
                
            select current_timestamp + numToDSInterval(current_building_time, 'second' ) INTO timp from dual;
            insert into build(end_time,village_id,building_id) values (timp,p_village_id,p_building_id);
            ok := 1;
          
        end if;
                    
  END;
  
  set serveroutput on;
  declare
  ok int := 1;
begin
  levelUp_building(1,1,ok);
  dbms_output.put_line(ok);
end;


select resource_number from villageresources where village_id=1;
select * from build where village_id=1;
update  villageresources set resource_number=1000 where village_id=1;

SELECT cast(end_time as timestamp(0)) from build where village_id=1 and building_id=1 order by end_time;

select cast(end_time - 0.5/(24*60*60) as timestamp(0)) from build where village_id=1;

select substr(to_char('10/20/2014 10:34:06.356000 AM'),1,instr(to_char('10/20/2014 10:34:06.356000 AM'),'.')-4)||' '||
substr(to_char('10/20/2014 10:34:06.356000 AM'),-2,instr(to_char('10/20/2014 10:34:06.356000 AM'),'.')-1) "Date"
from dual;

select substr(to_char(cast(end_time as timestamp(0))),1,16)||substr(cast(end_time as timestamp(0)),20,22) from build;

begin
update_buildings;
end;

select * from villagebuildings where village_id=1;
update villagebuildings set building_level = 1 where village_id =1 and building_id = 1;
delete from build where village_id = 1;

select count(id) from build where village_id=1 and building_id=1;
