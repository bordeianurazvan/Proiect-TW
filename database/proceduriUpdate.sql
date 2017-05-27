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
insert into build values (1,current_timestamp,1,1);
begin
update_buildings;
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
   spear int:=0;
   axe int:=0;
   sword int:=0;
   archer int :=0;
   zid int:=0;
   ratie number :=0;
   timp_intoarcere int:=0;
   timpp TIMESTAMP(6);
   id_nou int:=0;
   nume1 varchar2(50);
   nume2 varchar2(50);
   user1 int :=0;
   user2 int:=0;
   begin
   for i in(select * from commands) loop
   if(i.arrive_time<=current_timestamp)
   then
   if(i.command_type ='defense')
   then
     spear:=ratie*to_number(substr( i.units, 1, instr(i.units,' ',1,1)-1  )  );
     axe :=ratie*to_number( substr  (i.units, instr(i.units,' ',1,1)+1  ,instr(i.units,' ',1,2)-1-instr(i.units,' ',1,1) ) );
     sword :=ratie*to_number(substr(i.units,instr(i.units,' ',1,2)+1,instr(i.units,' ',1,3)-1 - instr(i.units,' ',1,2)));
     archer :=ratie*to_number(substr(i.units,instr(i.units,' ',1,3)+1,length(i.units)));
       update villagetroops set troop_number = troop_number+spear where village_id=i.to_village and troop_id =1;
      update villagetroops set troop_number = troop_number+axe where village_id=i.to_village and troop_id =2;  
        update villagetroops set troop_number = troop_number+sword where village_id=i.to_village and troop_id =3;
         update villagetroops set troop_number = troop_number+archer where village_id=i.to_village and troop_id =4;
   else
   suma_atacator :=
     20*to_number(substr( i.units, 1, instr(i.units,' ',1,1)-1  )  )
   + 30*to_number( substr  (i.units, instr(i.units,' ',1,1)+1  ,instr(i.units,' ',1,2)-1-instr(i.units,' ',1,1) ) ) 
   + 15*to_number(substr(i.units,instr(i.units,' ',1,2)+1,instr(i.units,' ',1,3)-1 - instr(i.units,' ',1,2)))
   + 10*to_number(substr(i.units,instr(i.units,' ',1,3)+1,length(i.units)));
   select building_level into zid from villagebuildings where building_id=2 and village_id=i.to_village;
   select troop_number into spear from villagetroops where village_id=i.to_village and troop_id=1;
   select troop_number into axe from villagetroops where village_id=i.to_village and troop_id=2;
    select troop_number into sword from villagetroops where village_id=i.to_village and troop_id=3;
    select troop_number into archer from villagetroops where village_id=i.to_village and troop_id=4;
    suma_aparator :=zid * (10*spear + 5*axe + 50*sword + 45 *archer) + 200;
    if suma_atacator >suma_aparator
    then
     ratie := suma_aparator/suma_atacator;
     spear:=round(ratie*to_number(substr( i.units, 1, instr(i.units,' ',1,1)-1  )  ));
     axe :=round(ratie*to_number( substr  (i.units, instr(i.units,' ',1,1)+1  ,instr(i.units,' ',1,2)-1-instr(i.units,' ',1,1) ) ));
     sword :=round(ratie*to_number(substr(i.units,instr(i.units,' ',1,2)+1,instr(i.units,' ',1,3)-1 - instr(i.units,' ',1,2))));
     archer :=round(ratie*to_number(substr(i.units,instr(i.units,' ',1,3)+1,length(i.units))));
     timp_intoarcere := timp(i.from_village,i.to_village);
    select current_timestamp + numToDSInterval( timp_intoarcere, 'second' ) INTO timpp from dual;
     update villagetroops set troop_number=0 where village_id = i.to_village;
     insert into commands(from_village,to_village,units,command_type,start_time,arrive_time) values (i.to_village,i.from_village,spear||' '||axe||' '||sword||' '||archer,'defense',current_timestamp,timpp);
     select user_id into id_nou from villages where village_id = i.from_village;
       select user_id into user1 from villages where village_id = i.from_village;
         select user_id into user2 from villages where village_id = i.to_village;
     update villages set user_id =id_nou where village_id=i.to_village;
     select village_name into nume1 from villages where village_id=i.from_village;
     select village_name into nume2 from villages where village_id=i.to_village;
      select troop_number into spear from villagetroops where village_id=i.to_village and troop_id=1;
   select troop_number into axe from villagetroops where village_id=i.to_village and troop_id=2;
    select troop_number into sword from villagetroops where village_id=i.to_village and troop_id=3;
    select troop_number into archer from villagetroops where village_id=i.to_village and troop_id=4;
     insert into reports(title,sent_units,village_units,message,from_user,to_user,from_village,to_village,user_id) values(nume1||' attacks '||nume2,i.units,spear||' '||axe||' '||sword||' '||archer,nume1||' conquered '||nume2,user1,user2,i.from_village,i.to_village,user1);
     insert into reports(title,sent_units,village_units,message,from_user,to_user,from_village,to_village,user_id) values(nume1||' attacks '||nume2,i.units,spear||' '||axe||' '||sword||' '||archer,nume1||' conquered '||nume2,user1,user2,i.from_village,i.to_village,user2);
     elsif suma_atacator=suma_aparator
     then
      update villagetroops set troop_number=0 where village_id = i.to_village;
       select user_id into user1 from villages where village_id = i.from_village;
         select user_id into user2 from villages where village_id = i.to_village;
     update villages set user_id =id_nou where village_id=i.to_village;
     select village_name into nume1 from villages where village_id=i.from_village;
     select village_name into nume2 from villages where village_id=i.to_village;
      select troop_number into spear from villagetroops where village_id=i.to_village and troop_id=1;
   select troop_number into axe from villagetroops where village_id=i.to_village and troop_id=2;
    select troop_number into sword from villagetroops where village_id=i.to_village and troop_id=3;
    select troop_number into archer from villagetroops where village_id=i.to_village and troop_id=4;   
     insert into reports(title,sent_units,village_units,message,from_user,to_user,from_village,to_village,user_id) values(nume1||' attacks '||nume2,i.units,spear||' '||axe||' '||sword||' '||archer,nume1||' failed to conquer '||nume2,user1,user2,i.from_village,i.to_village,user1);
     insert into reports(title,sent_units,village_units,message,from_user,to_user,from_village,to_village,user_id) values(nume1||' attacks '||nume2,i.units,spear||' '||axe||' '||sword||' '||archer,nume1||' failed to conquer '||nume2,user1,user2,i.from_village,i.to_village,user2);
      elsif suma_atacator <suma_aparator
      then
     ratie := suma_atacator/suma_aparator;
     spear:=round(ratie*to_number(substr( i.units, 1, instr(i.units,' ',1,1)-1  )  ));
     axe :=round(ratie*to_number( substr  (i.units, instr(i.units,' ',1,1)+1  ,instr(i.units,' ',1,2)-1-instr(i.units,' ',1,1) ) ));
     sword :=round(ratie*to_number(substr(i.units,instr(i.units,' ',1,2)+1,instr(i.units,' ',1,3)-1 - instr(i.units,' ',1,2))));
     archer :=round(ratie*to_number(substr(i.units,instr(i.units,' ',1,3)+1,length(i.units))));
     update villagetroops set troop_number = spear where village_id=i.to_village and troop_id =1;
      update villagetroops set troop_number = axe where village_id=i.to_village and troop_id =2;  
        update villagetroops set troop_number = sword where village_id=i.to_village and troop_id =3;
         update villagetroops set troop_number = archer where village_id=i.to_village and troop_id =4;
             select user_id into user1 from villages where village_id = i.from_village;
         select user_id into user2 from villages where village_id = i.to_village;
     update villages set user_id =id_nou where village_id=i.to_village;
     select village_name into nume1 from villages where village_id=i.from_village;
      select village_name into nume2 from villages where village_id=i.to_village;
   select troop_number into spear from villagetroops where village_id=i.to_village and troop_id=1;
    select troop_number into axe from villagetroops where village_id=i.to_village and troop_id=2;
    select troop_number into sword from villagetroops where village_id=i.to_village and troop_id=3;
    select troop_number into archer from villagetroops where village_id=i.to_village and troop_id=4;   
     insert into reports(title,sent_units,village_units,message,from_user,to_user,from_village,to_village,user_id) values(nume1||' attacks '||nume2,i.units,spear||' '||axe||' '||sword||' '||archer,nume1||' failed to conquer '||nume2,user1,user2,i.from_village,i.to_village,user1);
     insert into reports(title,sent_units,village_units,message,from_user,to_user,from_village,to_village,user_id) values(nume1||' attacks '||nume2,i.units,spear||' '||axe||' '||sword||' '||archer,nume1||' failed to conquer '||nume2,user1,user2,i.from_village,i.to_village,user2);
   end if;
   end if;
   delete from commands where id = i.id;
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

/
begin
commands_update;
end;
/
delete from commands;

insert into commands(from_village,to_village,units,command_type,start_time,arrive_time) values (4,5,'0 0 50 0','attack',current_timestamp,current_timestamp);
select * from commands;
select * from reports;
select * from villages;
select * from users;

            



