create or replace procedure barracks_create_troops(p_village_id int, spear int , axe int, sword int ,archer int , ok out int) as
spear_wood_cost int;
spear_stone_cost int;
spear_iron_cost int;
axe_wood_cost int;
axe_iron_cost int;
axe_stone_cost int;
sword_wood_cost int;
sword_iron_cost int;
sword_stone_cost int;
archer_wood_cost int;
archer_iron_cost int;
archer_stone_cost int;
spear_time int;
axe_time int;
sword_time int;
archer_time int;
available_wood int;
available_stone int;
available_iron int;
total_wood_cost int;
total_iron_cost int;
total_stone_cost int;
timp TIMESTAMP(6);
barracks_level int;
begin
  ok:=1;
  if(spear<0 or axe<0 or sword<0 or archer<0 or (spear+axe+sword+archer)=0) 
    then
      ok :=0;
    else
      SELECT troop_stone_cost,troop_time into spear_stone_cost,spear_time FROM troops WHERE troop_id=1;
      SELECT troop_wood_cost into spear_wood_cost FROM troops WHERE troop_id=1;
      SELECT troop_iron_cost into spear_iron_cost FROM troops WHERE troop_id=1;
      
      SELECT troop_stone_cost,troop_time into axe_stone_cost,axe_time FROM troops WHERE troop_id=2;
      SELECT troop_wood_cost into axe_wood_cost FROM troops WHERE troop_id=2;
      SELECT troop_iron_cost into axe_iron_cost FROM troops WHERE troop_id=2;
      
      SELECT troop_stone_cost,troop_time into sword_stone_cost,sword_time FROM troops WHERE troop_id=3;
      SELECT troop_wood_cost into sword_wood_cost FROM troops WHERE troop_id=3;
      SELECT troop_iron_cost into sword_iron_cost FROM troops WHERE troop_id=3;
      
      SELECT troop_stone_cost,troop_time into archer_stone_cost,archer_time FROM troops WHERE troop_id=4;
      SELECT troop_wood_cost into archer_wood_cost FROM troops WHERE troop_id=4;
      SELECT troop_iron_cost into archer_iron_cost FROM troops WHERE troop_id=4;
      
      
      SELECT resource_number into available_stone FROM villageresources where village_id=p_village_id and resource_id=1;
      SELECT resource_number into available_wood FROM villageresources where village_id=p_village_id and resource_id=2;
      SELECT resource_number into available_iron FROM villageresources where village_id=p_village_id and resource_id=3;
     
     total_stone_cost := spear*spear_stone_cost+axe*axe_stone_cost+sword*sword_stone_cost+archer*archer_stone_cost;
      if(available_stone<total_stone_cost)
        then
          ok:=0;
      end if;
      
      total_wood_cost := spear*spear_wood_cost+axe*axe_wood_cost+sword*sword_wood_cost+archer*archer_wood_cost;
      if(available_wood<total_wood_cost)
        then
          ok:=0;
      end if;
      
      total_iron_cost := spear*spear_iron_cost+axe*axe_iron_cost+sword*sword_iron_cost+archer*archer_iron_cost;
      if(available_iron<total_iron_cost)
        then
          ok:=0;
      end if;
      
      if(ok!=0)
        then
          --stone,wood,iron
          update villageresources 
          set resource_number=resource_number - (total_stone_cost)
          where resource_id=1 and village_id=p_village_id;
          
          update villageresources 
          set resource_number=resource_number - (total_wood_cost)
          where resource_id=2 and village_id=p_village_id;
          
          update villageresources 
          set resource_number=resource_number - (total_iron_cost)
          where resource_id=3 and village_id=p_village_id;
          
          
          select building_level into barracks_level from villagebuildings where village_id=p_village_id and building_id=3;
          spear_time := GREATEST(1,spear_time-barracks_level);
          axe_time := GREATEST(1,axe_time-barracks_level);
          sword_time := GREATEST(1,sword_time-barracks_level);
          archer_time := GREATEST(1,archer_time-barracks_level);
          if(spear>0)
            then
              select current_timestamp + numToDSInterval( spear*spear_time, 'second' ) INTO timp from dual;
              insert into createtroops(end_time,troop_number_tocreate,village_id,troop_id)
              values(timp,spear,p_village_id,1);
              ok:=1;
          end if;
          
          if(axe>0)
            then
              select current_timestamp + numToDSInterval( axe*axe_time, 'second' ) INTO timp from dual;
              insert into createtroops(end_time,troop_number_tocreate,village_id,troop_id)
              values(timp,axe,p_village_id,2);
              ok:=1;
          end if;
          
          if(sword>0)
            then
              select current_timestamp + numToDSInterval( sword*sword_time, 'second' ) INTO timp from dual;
              insert into createtroops(end_time,troop_number_tocreate,village_id,troop_id)
              values(timp,sword,p_village_id,3);
              ok:=1;
          end if;
          
          if(archer>0)
            then
              select current_timestamp + numToDSInterval( archer*archer_time, 'second' ) INTO timp from dual;
              insert into createtroops(end_time,troop_number_tocreate,village_id,troop_id)
              values(timp,archer,p_village_id,4);
              ok:=1;
          end if;
      end if;
  end if;
end;

