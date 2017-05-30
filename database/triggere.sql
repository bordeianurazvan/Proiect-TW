CREATE OR REPLACE PROCEDURE parcela_libera( x out int,y out int) AS
ok int :=0;
rand_x int;
rand_y int;
v_tip int;
begin
  while true loop
 rand_x :=dbms_random.value(1,100);
 rand_y :=dbms_random.value(1,100);
  select tip into v_tip from map where coord_x =rand_x and coord_y = rand_y;
  if(v_tip=0)
  then
   ok:=1;
   x :=rand_x;
   y :=rand_y;
  end if;
  exit when ok=1;
end loop;
end;
/
CREATE OR REPLACE TRIGGER first_village_trg
          after insert on users
          for each row
          declare
          x int;
          y int;
              begin
              parcela_libera(x,y);
         insert into villages(village_name,points,attacks_number,user_id,coord_x,coord_y) values( :new.username||'''s Village',0,0,:new.user_id,x,y);
         for i in 1..10 loop
          parcela_libera(x,y);
         insert into villages(village_name,points,attacks_number,user_id,coord_x,coord_y) values('Barbar Village',0,0,1,x,y);
         end loop;
         
         
end;
/
CREATE OR REPLACE TRIGGER first_village_trg1
          after insert on villages
          for each row
          declare
              begin
              if(:new.user_id<>1)
              then
                update Map set tip=1 where coord_x=:new.coord_x and coord_y=:new.coord_y;
               
                insert into villagetroops values(100,3,:new.village_id);
                insert into villagetroops values(0,1,:new.village_id);
                insert into villagetroops values(0,2,:new.village_id);
                insert into villagetroops values(0,4,:new.village_id);
                  insert into villagebuildings values(1,:new.village_id,2);
               
             else
                update Map set tip=2 where coord_x=:new.coord_x and coord_y=:new.coord_y;
                insert into villagetroops values(500,3,:new.village_id);
                insert into villagetroops values(500,1,:new.village_id);
                insert into villagetroops values(500,2,:new.village_id);
                insert into villagetroops values(500,4,:new.village_id);
                  insert into villagebuildings values(10,:new.village_id,2);
                end if;
                insert into villagebuildings values(1,:new.village_id,1);
                insert into villagebuildings values(1,:new.village_id,3);
                insert into villagebuildings values(1,:new.village_id,4);
                insert into villagebuildings values(1,:new.village_id,5);
                insert into villagebuildings values(1,:new.village_id,6);
                insert into villagebuildings values(1,:new.village_id,7);
                insert into villageresources values(500,:new.village_id,1);
                insert into villageresources values(500,:new.village_id,2);
                insert into villageresources values(500,:new.village_id,3);
   
end;
