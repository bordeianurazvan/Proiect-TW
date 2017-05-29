create or replace procedure barracks_create_troops(p_village_id int, spear int , axe int, sword int ,archer int , ok out int) as
spear_cost int;
axe_cost int;
sword_cost int;
archer_cost int;
spear_time int;
axe_time int;
sword_time int;
archer_time int;
available_wood int;
available_stone int;
available_iron int;
timp TIMESTAMP(6);
begin
  ok:=1;
  if(spear<0 or axe<0 or sword<0 or archer<0 or (spear+axe+sword+archer)=0) 
    then
      ok :=0;
    else
      SELECT troop_cost,troop_time into spear_cost,spear_time FROM troops WHERE troop_id=1;
      SELECT troop_cost,troop_time into axe_cost,axe_time FROM troops WHERE troop_id=2;
      SELECT troop_cost,troop_time into sword_cost,sword_time FROM troops WHERE troop_id=3;
      SELECT troop_cost,troop_time into archer_cost,archer_time FROM troops WHERE troop_id=4;
      SELECT resource_number into available_stone FROM villageresources where village_id=p_village_id and resource_id=1;
      SELECT resource_number into available_wood FROM villageresources where village_id=p_village_id and resource_id=2;
      SELECT resource_number into available_iron FROM villageresources where village_id=p_village_id and resource_id=3;
     
      if(available_stone<spear*spear_cost+axe*axe_cost+sword*sword_cost+archer*archer_cost)
        then
          ok:=0;
      end if;
      
      if(available_wood<spear*spear_cost+axe*axe_cost+sword*sword_cost+archer*archer_cost)
        then
          ok:=0;
      end if;
      
      if(available_iron<spear*spear_cost+axe*axe_cost+sword*sword_cost+archer*archer_cost)
        then
          ok:=0;
      end if;
      
      if(ok!=0)
        then
        
          update villageresources 
          set resource_number=resource_number-(spear*spear_cost+axe*axe_cost+sword*sword_cost+archer*archer_cost)
          where resource_id=1 and village_id=p_village_id;
          
          update villageresources 
          set resource_number=resource_number-(spear*spear_cost+axe*axe_cost+sword*sword_cost+archer*archer_cost)
          where resource_id=2 and village_id=p_village_id;
          
          update villageresources 
          set resource_number=resource_number-(spear*spear_cost+axe*axe_cost+sword*sword_cost+archer*archer_cost)
          where resource_id=3 and village_id=p_village_id;
          
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

declare
  ok int :=-1;
begin
  barracks_create_troops(1,0,2,0,3,ok);
  dbms_output.put_line(ok);
end;
select resource_number from villageresources where village_id=1;
select * from createtroops where village_id=1;
