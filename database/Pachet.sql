
CREATE OR REPLACE PACKAGE functii AS
   TYPE lista_sate IS TABLE OF int INDEX BY PLS_INTEGER;
  PROCEDURE validareLogin (p_username users.username%type , p_parola users.user_password%type,ok out int);
  PROCEDURE inregistrare(p_username users.username%type ,p_password users.user_password%type, p_bday users.birthday%type,ok out int);
  PROCEDURE varsta(p_user_id users.user_id%type,p_varsta out int);
  PROCEDURE changePassword(p_username users.username%type , p_parolaVeche users.user_password%type,p_parolaNoua users.user_password%type,ok out int);
  PROCEDURE changeUsername(p_username users.username%type ,p_password users.user_password%type,p_newUsername users.username%type,ok out int);
  PROCEDURE deleteUser(p_username users.username%type ,p_password users.user_password%type,ok out int);
  PROCEDURE createTicket(p_userId users.user_id%type,p_ticketText varchar2,ok out int);
  PROCEDURE inregistrareFB(p_username users.username%type,p_password users.user_password%type,p_bday users.birthday%type,fb_id varchar2,ok out int);
 /*
  PROCEDURE stergere (p_username users.username%type , p_parola users.u_password%type,p_parola1 users.u_password%type,ok out int);
  PROCEDURE schimbare_parola (p_username users.username%type , p_parola users.u_password%type,p_parola1 users.u_password%type,ok out int);
  PROCEDURE top10(p_user_id users.user_id%type,p_coordx villages.coord_x%type,p_coordy villages.coord_y%type ,sate out lista_sate);
  PROCEDURE atac(p_username users.username%type,p_village_id_sender villages.village_id%type,p_village_id_receiver villages.village_id%type ,p_troop_number lista_sate, ok out int) ;
  PROCEDURE satNW(p_username users.username%type,ok out int) ;
  PROCEDURE village_create(p_username users.username%type,x int ,y int );
 */
 end;
 /
 CREATE OR REPLACE PACKAGE BODY functii IS
 
  PROCEDURE validareLogin (p_username users.username%type , p_parola users.user_password%type,ok out int)  AS
 stare int:=0;
 begin
 select count(u.username) into stare from users u where u.username=p_username and u.user_password=p_parola;
 if stare<>0
 then
 select user_id into ok from users where username=p_username;
 else
 ok:=-1;
 end if;
 end;
 
  PROCEDURE inregistrare(p_username users.username%type,p_password users.user_password%type,p_bday users.birthday%type,ok out int)  AS
  current_id int;
  stare int;
 begin
select count(*) into stare  from users where username=p_username;
if stare >0
then
ok:= -1;
else
 insert into users(username,user_password,new_report,birthday,data_inregistrare,general_points,battle_points) values(p_username,p_password,0, to_date(p_bday,'DD-MON-RR'), sysdate,0,0);
 select user_id into ok from users where username=p_username;
 end if;
 end;
 
  PROCEDURE varsta(p_user_id users.user_id%type,p_varsta out int) AS
  data_nastere users.birthday%type;
  begin
    select birthday into data_nastere from users where user_id = p_user_id;
    p_varsta := TRUNC(MONTHS_BETWEEN(SYSDATE, data_nastere))/12;
    if(p_varsta <0) then p_varsta := -1;
    end if;
  end;
  
  PROCEDURE inregistrareFB(p_username users.username%type,p_password users.user_password%type,p_bday users.birthday%type,fb_id varchar2,ok out int)  AS
  current_id int;
  stare int;
 begin
select count(*) into stare  from users where username=p_username;
if stare >0
then
ok:= -1;
else
 insert into users(username,fb_id,user_password,new_report,birthday,data_inregistrare,general_points,battle_points) values(p_username,fb_id,p_password,0, to_date(p_bday,'DD-MON-RR'), sysdate,0,0);
 select user_id into ok from users where username=p_username;
 end if;
 end;
 

  PROCEDURE changePassword(p_username users.username%type , p_parolaVeche users.user_password%type,p_parolaNoua users.user_password%type,ok out int) AS
  stare int := 0;
  begin
     select count(u.username) into stare from users u where u.username=p_username and u.user_password=p_parolaVeche;
    if stare<>0
      then
       select user_id into ok from users where username=p_username;
        update users set user_password = p_parolaNoua where user_id = ok; 
      else
        ok:=-1;
    end if;
  end;
  
  PROCEDURE changeUsername(p_username users.username%type ,p_password users.user_password%type,p_newUsername users.username%type,ok out int) AS
  stare int := 0;
  begin
     select count(u.username) into stare from users u where u.username=p_username and u.user_password=p_password;
    if stare<>0
      then
       select user_id into ok from users where username=p_username;
        update users set username = p_newUsername where user_id = ok; 
      else
        ok:=-1;
    end if;
  end;
  
  PROCEDURE deleteUser(p_username users.username%type ,p_password users.user_password%type,ok out int) AS
  stare int := 0;
  begin
     select count(u.username) into stare from users u where u.username=p_username and u.user_password=p_password;
    if stare<>0
      then
       ok := 1;
        delete from users where username = p_username;
      else
        ok:=-1;
    end if;
  end;
  
  PROCEDURE createTicket(p_userId users.user_id%type,p_ticketText varchar2,ok out int) AS
  stare int := 0;
  begin
     select count(u.user_id) into stare from users u where u.user_id = p_userId;
    if stare<>0
      then
       select user_id into ok from users where user_id=p_userId;
        insert into tickets(ticket_text,ticket_date,user_id) values (p_ticketText,current_timestamp,p_userId);
      else
        ok:=-1;
    end if;
  end;
 /*
 PROCEDURE stergere (p_username users.username%type , p_parola users.u_password%type,p_parola1 users.u_password%type,ok out int) AS
 stare int;
 begin
 if(p_parola = p_parola1)
 then
 select count(*) into stare from users where username=p_username and p_parola=u_password;
if stare =0
then
ok:= 0;
else
delete from users where username=p_username;
ok:=1;
end if;
 else
 ok:= 0;
 end if;
 end;
  PROCEDURE schimbare_parola (p_username users.username%type , p_parola users.u_password%type,p_parola1 users.u_password%type,ok out int) AS
 stare int;
 begin
 select count(*) into stare from users where username=p_username and p_parola=u_password;
if stare =0
then
ok:= 0;
else
update users   set u_password =p_parola1 where username = p_username and p_parola=u_password;
ok:=1;
end if;
 end;
 
   PROCEDURE top10(p_user_id users.user_id%type,p_coordx villages.coord_x%type,p_coordy villages.coord_y%type ,sate out lista_sate) AS
   contor int :=0;
   begin
     for i in (select * from villages where coord_x=p_coordx and p_user_id<>user_id) loop
     
     sate(contor) :=i.village_id;
     contor:=contor+1;
     end loop;
     for i in (select * from villages where coord_y=p_coordy and p_user_id<>user_id) loop
     
     sate(contor) :=i.village_id;
     contor:=contor+1;
     end loop;
   end;
     PROCEDURE atac(p_username users.username%type,p_village_id_sender villages.village_id%type,p_village_id_receiver villages.village_id%type ,p_troop_number lista_sate, ok out int) AS
     
     village_troops lista_sate;
     contor int :=0;
    distanta int :=0;
     trimis_x int :=0;
     trimis_y int :=0;
     primit_x int :=0;
     primit_y int :=0;
     data_ajuns date;
     begin
     ok:=1;
       for i in(select * from villageTroops where village_id=p_village_id_sender order by troop_id) loop
         if i.troop_number < p_troop_number(i.troop_id) or  p_troop_number(i.troop_id) <0
         then
          ok:=0;
         end if;
         end loop;
         select count(*),coord_x,coord_y into contor,primit_x,primit_y from villages where village_id=p_village_id_receiver group by coord_x,coord_y;
         if contor =0
         then
         ok:=0;
         end if;   
      select count(*),coord_x,coord_y into contor,trimis_x,trimis_y from villages v join users u on u.user_id=v.user_id where v.village_id=p_village_id_sender and u.username=p_username group by coord_x,coord_y;
        -- select count(village_id)  into contor from villages v  where v.village_id=p_village_id_sender ;
         if contor =0
         then
         ok:=0;
         end if;
               select MAX(id) into contor from commands ;
         if ok=1
         then
            contor:=contor+1;
            distanta:=sqrt((trimis_x-primit_x)*(trimis_x-primit_x)+(trimis_y-primit_y)*(trimis_y-primit_y))*(p_troop_number(1)+p_troop_number(2)+p_troop_number(3)+p_troop_number(4));
            data_ajuns:=sysdate+distanta/86400;
             insert into commands values(contor,p_village_id_sender,p_village_id_receiver,p_troop_number(1)||' '||p_troop_number(2)||' '||p_troop_number(3)||' '||p_troop_number(4),'attack',sysdate,data_ajuns,p_village_id_sender);
         end if;
         
        
     end;
  PROCEDURE village_create(p_username users.username%type,x int ,y int) AS
  id_village int;
  id_user int;
   begin
   select user_id into id_user from users where username=p_username;
   select MAX(village_id) into id_village from villages;
   id_village := id_village+1;
     insert into villages values (id_village,'First Village',0,0,id_user,x,y);
     insert into Villagebuildings values (id_village,1,1);
      insert into Villagebuildings values (id_village,2,1);
      insert into Villagebuildings values (id_village,3,1);
       insert into Villagebuildings values (id_village,4,1);
       insert into Villagebuildings values (id_village,5,1);
       insert into Villagebuildings values (id_village,6,1);
       insert into Villagebuildings values (id_village,7,1);
       insert into villagetroops values(3,id_village,50);
         insert into villagetroops values(1,id_village,0);
           insert into villagetroops values(2,id_village,0);
             insert into villagetroops values(4,id_village,0);
             insert into VillageResources values(id_village,1,500);
              insert into VillageResources values(id_village,2,500);
               insert into VillageResources values(id_village,3,500);
       end;
       
       PROCEDURE satNW(p_username users.username%type,ok out int) AS
       randx int:=0;
       randy int:=0;
       begin
          ok:=1;
       while(ok=1) loop
         randx :=dbms_random.value(1,50);
         randy :=dbms_random.value(1,50);
          select tip into ok from map where coord_x=randx and coord_y=randy;
          
          end loop;
          
         update map
         set tip=1
         where coord_x=randx and coord_y=randy;
          village_create(p_username,randx,randy);
        
         
       end;
   */    
 end;
/

/*select * from commands order by id desc;
to_char( arrive_time, 'dd-mon-yy hh24:mi:ss' ) from commands
select id,to_char( arrive_time, 'dd-mon-yy hh24:mi:ss' ),to_char( start_time, 'dd-mon-yy hh24:mi:ss' ) from commands order by id desc;
*/

