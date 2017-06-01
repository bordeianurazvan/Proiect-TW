CREATE OR REPLACE PROCEDURE levelUp_building(p_village_id villages.village_id%type,p_building_id buildings.building_id%type,ok out int) AS                                            
  current_building_level int;
  current_building_cost_iron int;
  current_building_cost_wood int;
  current_building_cost_stone int;
  current_building_time int;
  available_stone int;
  available_wood int;
  available_iron int;
  timp TIMESTAMP(6);
  
  BEGIN 
        SELECT building_level into current_building_level FROM villagebuildings where village_id = p_village_id and building_id = p_building_id;
        
        SELECT building_cost_iron  into current_building_cost_iron FROM buildings where building_id = p_building_id;
        current_building_cost_iron := current_building_cost_iron*current_building_level;
        
        SELECT building_cost_wood  into current_building_cost_wood FROM buildings where building_id = p_building_id;
        current_building_cost_wood := current_building_cost_wood*current_building_level;
        
        SELECT building_cost_stone  into current_building_cost_stone FROM buildings where building_id = p_building_id;
        current_building_cost_stone := current_building_cost_stone*current_building_level;
        
        SELECT building_time into current_building_time FROM buildings where building_id = p_building_id;
        current_building_time := current_building_time*current_building_level;
        
        SELECT resource_number into available_stone FROM villageresources where village_id=p_village_id and resource_id=1;
        SELECT resource_number into available_wood FROM villageresources where village_id=p_village_id and resource_id=2;
        SELECT resource_number into available_iron FROM villageresources where village_id=p_village_id and resource_id=3;
        
        if((available_stone < current_building_cost_stone) or (available_wood < current_building_cost_wood) or (available_iron <current_building_cost_iron))
          then ok := 0;
          else ok :=1 ;
        end if;
       
        if (ok!=0)
          then  update villageresources 
                set resource_number=resource_number-(current_building_cost_stone)
                where resource_id=1 and village_id=p_village_id;
                
                update villageresources 
                set resource_number=resource_number-(current_building_cost_wood)
                where resource_id=2 and village_id=p_village_id;
                
                update villageresources 
                set resource_number=resource_number-(current_building_cost_iron)
                where resource_id=3 and village_id=p_village_id;
                
            select current_timestamp + numToDSInterval(current_building_time, 'second' ) INTO timp from dual;
            insert into build(end_time,village_id,building_id) values (timp,p_village_id,p_building_id);
            ok := 1;
          
        end if;
                    
  END;