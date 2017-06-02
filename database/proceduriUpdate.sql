CREATE OR REPLACE FUNCTION minim(a int,b int) return int as
begin
if(a>=b)
then
return b;
else
return a;
end if;
end;
/

CREATE OR REPLACE PROCEDURE update_resources as
  b_level integer:=0;
  s_level int:=0;
begin
  for i in(select * from villageresources) loop
    if(i.resource_id=1)
      then
        select building_level into b_level from villagebuildings where village_id=i.village_id and building_id=4;
        select building_level into s_level from villagebuildings where village_id=i.village_id and building_id=7;
      
        update villageresources set resource_number =minim(1000*s_level,resource_number +(10*b_level)) where village_id=i.village_id and resource_id=1;
    elsif (i.resource_id=2)
      then
        select building_level into b_level from villagebuildings where village_id=i.village_id and building_id=5;
       select building_level into s_level from villagebuildings where village_id=i.village_id and building_id=7;
      
        update villageresources set resource_number =minim(1000*s_level,resource_number +(10*b_level)) where village_id=i.village_id and resource_id=2;
      elsif(i.resource_id=3)
        then
          select building_level into b_level from villagebuildings where village_id=i.village_id and building_id=6;
         select building_level into s_level from villagebuildings where village_id=i.village_id and building_id=7;
      
        update villageresources set resource_number =minim(1000*s_level,resource_number +(10*b_level)) where village_id=i.village_id and resource_id=3;
    end if;
  end loop;
end;
/
create or replace TRIGGER delete_command1
            before delete on Build
            for each row
                begin
              update VillageBuildings set building_level = building_level+1
              where village_id = :old.village_id and building_id = :old.building_id;
              end;
/
CREATE OR REPLACE PROCEDURE update_buildings as
begin
delete from build where end_time<=current_timestamp;
end;
/
create or replace TRIGGER delete_createTroops1
            before delete on createtroops
            for each row
                begin
              update Villagetroops set troop_number = troop_number + :old.troop_number_tocreate
              where village_id = :old.village_id and troop_id = :old.troop_id;
              end;
/
CREATE OR REPLACE PROCEDURE update_troops as
begin
delete from createtroops where end_time<=current_timestamp;
end;
/

CREATE OR REPLACE procedure commands_update as
   suma_atacator int:=0;
   suma_aparator int:=0;
   spear_att int:=0;
   axe_att int:=0;
   sword_att int:=0;
   archer_att int :=0;
   spear_def int:=0;
   axe_def int:=0;
   sword_def int:=0;
   archer_def int :=0;
   zid int:=0;
   ratie number :=0;
   timp_intoarcere int:=0;
   timpp TIMESTAMP(6);
   id_nou int:=0;
   nume1 varchar2(50);
   nume2 varchar2(50);
   user1 int :=0;
   user2 int:=0;
   spear_al int :=0;
   axe_al int:=0;
   sword_al int:=0;
   archer_al int :=0;
   puncte int:=0;
   att_name varchar(50);
   def_name varchar(50);
   validate_village1 int;
   validate_village2 int;
   att_position varchar2(30);
   def_position varchar2(30);
   x int;
   y int;
   begin
   for i in(select * from commands) loop
   select count(village_id) into validate_village1 from villages where village_id=i.from_village;
   select count(village_id) into validate_village2 from villages where village_id=i.to_village;
   if(validate_village1<1 and validate_village2<1)
    then
      delete from commands where id=i.id;
   elsif(validate_village1<1)
      then
        delete from commands where id=i.id;
    elsif(validate_village2<1)
      then
        spear_att:=to_number(substr( i.units, 1, instr(i.units,' ',1,1)-1  )  );
        axe_att :=to_number( substr  (i.units, instr(i.units,' ',1,1)+1  ,instr(i.units,' ',1,2)-1-instr(i.units,' ',1,1) ) );
        sword_att :=to_number(substr(i.units,instr(i.units,' ',1,2)+1,instr(i.units,' ',1,3)-1 - instr(i.units,' ',1,2)));
        archer_att :=to_number(substr(i.units,instr(i.units,' ',1,3)+1,length(i.units)));
        update villagetroops set troop_number = troop_number+spear_att where village_id=i.from_village and troop_id =1;
        update villagetroops set troop_number = troop_number+axe_att where village_id=i.from_village and troop_id =2;  
        update villagetroops set troop_number = troop_number+sword_att where village_id=i.from_village and troop_id =3;
        update villagetroops set troop_number = troop_number+archer_att where village_id=i.from_village and troop_id =4;
        delete from commands where id=i.id;
  
    else
   if(i.arrive_time<=current_timestamp)
   then
     spear_att:=to_number(substr( i.units, 1, instr(i.units,' ',1,1)-1  )  );
     axe_att :=to_number( substr  (i.units, instr(i.units,' ',1,1)+1  ,instr(i.units,' ',1,2)-1-instr(i.units,' ',1,1) ) );
     sword_att :=to_number(substr(i.units,instr(i.units,' ',1,2)+1,instr(i.units,' ',1,3)-1 - instr(i.units,' ',1,2)));
     archer_att :=to_number(substr(i.units,instr(i.units,' ',1,3)+1,length(i.units)));
   if(i.command_type ='defense')
   then
      update villagetroops set troop_number = troop_number+spear_att where village_id=i.to_village and troop_id =1;
      update villagetroops set troop_number = troop_number+axe_att where village_id=i.to_village and troop_id =2;  
      update villagetroops set troop_number = troop_number+sword_att where village_id=i.to_village and troop_id =3;
      update villagetroops set troop_number = troop_number+archer_att where village_id=i.to_village and troop_id =4;
   else
      suma_atacator :=
          20*to_number(substr( i.units, 1, instr(i.units,' ',1,1)-1  )  )
        + 30*to_number( substr  (i.units, instr(i.units,' ',1,1)+1  ,instr(i.units,' ',1,2)-1-instr(i.units,' ',1,1) ) ) 
        + 15*to_number(substr(i.units,instr(i.units,' ',1,2)+1,instr(i.units,' ',1,3)-1 - instr(i.units,' ',1,2)))
        + 10*to_number(substr(i.units,instr(i.units,' ',1,3)+1,length(i.units)));
      
      select building_level into zid from villagebuildings where building_id=2 and village_id=i.to_village;
      
      select troop_number into spear_def from villagetroops where village_id=i.to_village and troop_id=1;
      select troop_number into axe_def from villagetroops where village_id=i.to_village and troop_id=2;
      select troop_number into sword_def from villagetroops where village_id=i.to_village and troop_id=3;
      select troop_number into archer_def from villagetroops where village_id=i.to_village and troop_id=4;
      
      suma_aparator :=(10*spear_def + 5*axe_def + 50*sword_def + 45 *archer_def) + 10*zid;
      
      select user_id into user1 from villages where village_id = i.from_village;
      select user_id into user2 from villages where village_id = i.to_village;
      
      select village_name into nume1 from villages where village_id=i.from_village;
      select village_name into nume2 from villages where village_id=i.to_village;
      
      select ' ('||coord_x||'|'||coord_y||')' into att_position from villages where village_id=i.from_village;
      select ' ('||coord_x||'|'||coord_y||')' into def_position from villages where village_id=i.to_village;
       
      select username into att_name from users where user_id=user1;
      select username into def_name from users where user_id=user2;
      if suma_atacator >suma_aparator
        then
        
    
          puncte := spear_def + axe_def + sword_def + archer_def;
          update users set battle_points =battle_points +puncte where user_id=user1;
          
        
          ratie := suma_aparator/suma_atacator;
          spear_al:=round((1-ratie)*spear_att);
          axe_al :=round((1-ratie)*axe_att);
          sword_al :=round((1-ratie)*sword_att);
          archer_al :=round((1-ratie)*archer_att);
          
          update users set battle_points = battle_points +( (spear_att-spear_al)+(axe_att-axe_al)+(sword_att-sword_al)+(archer_att-archer_al)) where user_id=user2;
          
          timp_intoarcere := timp(i.from_village,i.to_village)/2;
          select current_timestamp + numToDSInterval( timp_intoarcere, 'second' ) INTO timpp from dual;
          update villagetroops set troop_number=0 where village_id = i.to_village;
          insert into commands(from_village,to_village,units,command_type,start_time,arrive_time) 
          values (i.to_village,i.from_village,spear_al||' '||axe_al||' '||sword_al||' '||archer_al,'defense',current_timestamp,timpp);
          
          update villages set user_id =user1 where village_id=i.to_village;
          
          select points into x from villages where village_id = i.to_village;
          update users set general_points = general_points - x where user_id=user2;
          update users set general_points = general_points + x where user_id=user1;
          
          select coord_x into x from villages where village_id=i.to_village;
          select coord_y into y from villages where village_id=i.to_village;
          
          update map set tip=1 where coord_x=x and coord_y=y;
          
          
          insert into reports(title,sent_units,village_units,message,from_user,to_user,from_village,to_village,user_id,generation_time) 
          values(nume1||' attacks '||nume2,i.units||'#'||spear_al||' '||axe_al||' '||sword_al||' '||archer_al,spear_def||' '||axe_def||' '||sword_def||' '||archer_def||'#'||'0 0 0 0',nume1||' conquered '||nume2,att_name,def_name,nume1||att_position,nume2||def_position,user1,current_timestamp);
          
          insert into reports(title,sent_units,village_units,message,from_user,to_user,from_village,to_village,user_id,generation_time) 
          values(nume1||' attacks '||nume2,i.units||'#'||spear_al||' '||axe_al||' '||sword_al||' '||archer_al,spear_def||' '||axe_def||' '||sword_def||' '||archer_def||'#'||'0 0 0 0',nume1||' conquered '||nume2,att_name,def_name,nume1||att_position,nume2||def_position,user2,current_timestamp);
      
        elsif suma_atacator=suma_aparator
      
          then
            puncte := spear_def + axe_def + sword_def + archer_def;
            update users set battle_points =battle_points +puncte where user_id=user1;
            
            puncte := spear_att + axe_att + sword_att + archer_att;
            update users set battle_points =battle_points +puncte where user_id=user2;
          
          
            update villagetroops set troop_number=0 where village_id = i.to_village;   
            insert into reports(title,sent_units,village_units,message,from_user,to_user,from_village,to_village,user_id,generation_time) 
            values(nume1||' attacks '||nume2,i.units||'#'||'0 0 0 0',spear_def||' '||axe_def||' '||sword_def||' '||archer_def||'#'||'0 0 0 0',nume1||' failed to conquer '||nume2,att_name,def_name,nume1||att_position,nume2||def_position,user1,current_timestamp);
            insert into reports(title,sent_units,village_units,message,from_user,to_user,from_village,to_village,user_id,generation_time) 
            values(nume1||' attacks '||nume2,i.units||'#'||'0 0 0 0',spear_def||' '||axe_def||' '||sword_def||' '||archer_def||'#'||'0 0 0 0',nume1||' failed to conquer '||nume2,att_name,def_name,nume1||att_position,nume2||def_position,user2,current_timestamp);
          elsif suma_atacator <suma_aparator
            then
            
             puncte := spear_att + axe_att + sword_att + archer_att;
             update users set battle_points =battle_points +puncte where user_id=user2;
          
            
              ratie := suma_atacator/suma_aparator;
              
              spear_al:=round((1-ratie)*spear_def);
              axe_al :=round((1-ratie)*axe_def);
              sword_al :=round((1-ratie)*sword_def);
              archer_al :=round((1-ratie)*archer_def);
          
              update users set battle_points = battle_points +( (spear_def-spear_al)+(axe_def-axe_al)+(sword_def-sword_al)+(archer_def-archer_al)) where user_id=user1;
              
              update villagetroops set troop_number = round((1-ratie)*spear_def) where village_id=i.to_village and troop_id =1;
              update villagetroops set troop_number = round((1-ratie)*axe_def) where village_id=i.to_village and troop_id =2;  
              update villagetroops set troop_number = round((1-ratie)*sword_def) where village_id=i.to_village and troop_id =3;
              update villagetroops set troop_number = round((1-ratie)*archer_def) where village_id=i.to_village and troop_id =4;  
              insert into reports(title,sent_units,village_units,message,from_user,to_user,from_village,to_village,user_id,generation_time) 
              values(nume1||' attacks '||nume2,i.units||'#'||'0 0 0 0',spear_def||' '||axe_def||' '||sword_def||' '||archer_def||'#'||round((1-ratie)*spear_def)||' '||round((1-ratie)*axe_def)||' '||round((1-ratie)*sword_def)||' '||round((1-ratie)*archer_def),nume1||' failed to conquer '||nume2,att_name,def_name,nume1||att_position,nume2||def_position,user1,current_timestamp);
              insert into reports(title,sent_units,village_units,message,from_user,to_user,from_village,to_village,user_id,generation_time) 
              values(nume1||' attacks '||nume2,i.units||'#'||'0 0 0 0',spear_def||' '||axe_def||' '||sword_def||' '||archer_def||'#'||round((1-ratie)*spear_def)||' '||round((1-ratie)*axe_def)||' '||round((1-ratie)*sword_def)||' '||round((1-ratie)*archer_def),nume1||' failed to conquer '||nume2,att_name,def_name,nume1||att_position,nume2||def_position,user2,current_timestamp);
       end if;
    end if;
   delete from commands where id = i.id;
   end if;
   end if;
   end loop;
end;
   
/   
CREATE OR REPLACE FUNCTION timp(p_village_id1 int,p_village_id2 int) return int as
   x1 int:=0;
   y1 int:=0;
   x2 int:=0;
   y2 int:=0;
  distanta int:=0;
begin
   select coord_x,coord_y into x1,y1 from villages where village_id=p_village_id1;
   select coord_x,coord_y into x2,y2 from villages where village_id=p_village_id2;
   distanta:= round(sqrt( (x2-x1)*(x2-x1) + (y2-y1)*(y2-y1)));
   return distanta *10;
end;
     



