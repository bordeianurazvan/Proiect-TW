drop table map cascade constraints purge;
/
drop table users cascade constraints purge;
/
drop table villages cascade constraints purge;
/
drop table leaderboard cascade constraints purge;
/
drop table troops cascade constraints purge;
/
drop table villagetroops cascade constraints purge;
/
drop table buildings cascade constraints purge;
/
drop table villagebuildings cascade constraints purge;
/
drop table createtroops cascade constraints purge;
/
drop table resources cascade constraints purge;
/
drop table villageresources cascade constraints purge;
/
drop table build cascade constraints purge;
/
--drop table logins cascade constraints purge;
drop table commands cascade constraints purge;
/
drop table reports cascade constraints purge;
/
drop table ranking cascade constraints purge;
/
drop table tickets cascade constraints purge;
/
CREATE TABLE Map
(
  coord_x INT NOT NULL,
  coord_y INT NOT NULL,
  tip INT NOT NULL,
  PRIMARY KEY (coord_x, coord_y)
);
/
CREATE TABLE Users
(
  user_id INT NOT NULL,
  username VARCHAR2(50) NOT NULL,
  user_password VARCHAR2(64) NOT NULL,
  new_report INT NOT NULL,
  birthday DATE NOT NULL,
  data_inregistrare DATE NOT NULL,
  general_points INT NOT NULL,
  battle_points INT NOT NULL,
  PRIMARY KEY (user_id),
  unique(username)
);
/
CREATE TABLE Villages
(
  village_id INT NOT NULL,
  village_name VARCHAR2(75) NOT NULL,
  points INT NOT NULL,
  attacks_number INT NOT NULL,
  user_id INT NOT NULL,
  coord_x INT NOT NULL,
  coord_y INT NOT NULL,
  PRIMARY KEY (village_id),
  FOREIGN KEY (user_id) REFERENCES USERS(user_id) ON DELETE CASCADE ,
  FOREIGN KEY (coord_x, coord_y) REFERENCES Map(coord_x, coord_y) ON DELETE CASCADE
    
);
/
CREATE TABLE Leaderboard
(
  leaderboard_id INT NOT NULL,
  title VARCHAR2(100) NOT NULL,
  PRIMARY KEY (leaderboard_id)
);
/
CREATE TABLE Troops
(
  troop_id INT NOT NULL,
  troop_name VARCHAR2(20) NOT NULL,
  troop_attackPower INT NOT NULL,
  troop_defensePower INT NOT NULL,
  troop_stone_cost INT NOT NULL,
  troop_wood_cost INT NOT NULL,
  troop_iron_cost INT NOT NULL,
  troop_time INT NOT NULL,
  PRIMARY KEY (troop_id)
);
/
CREATE TABLE VillageTroops
(
  troop_number INT NOT NULL,
  troop_id INT NOT NULL,
  village_id INT NOT NULL,
  FOREIGN KEY (troop_id) REFERENCES Troops(troop_id) ON DELETE CASCADE,
  FOREIGN KEY (village_id) REFERENCES Villages(village_id) ON DELETE CASCADE
);
/
CREATE TABLE Buildings
(
  building_id INT NOT NULL,
  building_name VARCHAR2(50) NOT NULL,
  building_points INT NOT NULL,
  building_cost INT NOT NULL,
  building_time INT NOT NULL,
  PRIMARY KEY (building_id)
);
/
CREATE TABLE VillageBuildings
(
  building_level INT NOT NULL,
  village_id INT NOT NULL,
  building_id INT NOT NULL,
  FOREIGN KEY (village_id) REFERENCES Villages(village_id) ON DELETE CASCADE,
  FOREIGN KEY (building_id) REFERENCES Buildings(building_id) ON DELETE CASCADE
);
/
CREATE TABLE CreateTroops
(
  id INT NOT NULL,
  end_time TIMESTAMP(6) NOT NULL,
  troop_number_toCreate INT NOT NULL,
  village_id INT NOT NULL,
  troop_id INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (village_id) REFERENCES Villages(village_id) ON DELETE CASCADE,
  FOREIGN KEY (troop_id) REFERENCES Troops(troop_id) ON DELETE CASCADE
);
/
CREATE TABLE Resources
(
  resource_id INT NOT NULL,
  resource_name VARCHAR2(20) NOT NULL,
  PRIMARY KEY (resource_id)
);
/
CREATE TABLE VillageResources
(
  resource_number INT NOT NULL,
  village_id INT NOT NULL,
  resource_id INT NOT NULL,
  FOREIGN KEY (village_id) REFERENCES Villages(village_id) ON DELETE CASCADE,
  FOREIGN KEY (resource_id) REFERENCES Resources(resource_id) ON DELETE CASCADE
);
/
CREATE TABLE Build
(
  id INT NOT NULL,
  end_time TIMESTAMP(6) NOT NULL,
  village_id INT NOT NULL,
  building_id INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (village_id) REFERENCES Villages(village_id) ON DELETE CASCADE,
  FOREIGN KEY (building_id) REFERENCES Buildings(building_id) ON DELETE CASCADE
);
/
/*CREATE TABLE Logins
(
  id INT NOT NULL,
  username VARCHAR(250) NOT NULL,
  time DATE NOT NULL,
  ip VARCHAR(30) NOT NULL,
  user_id INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE
);
*/
CREATE TABLE Commands
(
  id INT NOT NULL,
  from_village INT NOT NULL,
  to_village INT NOT NULL,
  units VARCHAR(350) NOT NULL,
  command_type VARCHAR(20) NOT NULL,
  start_time TIMESTAMP(6) NOT NULL,
  arrive_time TIMESTAMP(6) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (from_village) REFERENCES Villages(village_id) ON DELETE CASCADE
);
/
CREATE TABLE Reports
(
  id INT NOT NULL,
  title VARCHAR(200) NOT NULL,
  sent_units VARCHAR(250) NOT NULL,
  village_units VARCHAR(250) NOT NULL,
  message VARCHAR(250) NOT NULL,
  from_user VARCHAR2(50) NOT NULL,
  to_user VARCHAR2(50) NOT NULL,
  from_village VARCHAR2(75) NOT NULL,
  to_village VARCHAR2(75) NOT NULL,
  user_id INT NOT NULL,
  generation_time TIMESTAMP(6),
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE
);
/
CREATE TABLE Ranking
(
  leaderboard_id INT NOT NULL,
  user_id INT NOT NULL,
  FOREIGN KEY (leaderboard_id) REFERENCES Leaderboard(leaderboard_id) ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE
);
/
CREATE TABLE Tickets
(
  ticket_id  INT NOT NULL,
  ticket_text VARCHAR2(430),
  ticket_date TIMESTAMP(6),
  user_id INT NOT NULL,
  PRIMARY KEY (ticket_id),
  FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE
);
/
DROP SEQUENCE ticket_id_seq;
/
CREATE SEQUENCE ticket_id_seq
MINVALUE 1
MAXVALUE 999999999999999999999999999
START WITH 1
INCREMENT BY 1
NOCACHE; 
/
CREATE OR REPLACE TRIGGER ticket_id_trg
          before insert on tickets
          for each row
              begin
          if :new.ticket_id is null then
              select ticket_id_seq.nextval into :new.ticket_id from dual;
          end if;
end;
/
DROP SEQUENCE users_id_seq;
/
CREATE SEQUENCE users_id_seq
MINVALUE 2
MAXVALUE 999999999999999999999999999
START WITH 2
INCREMENT BY 1
NOCACHE; 
/ 
CREATE OR REPLACE TRIGGER users_id_trg
          before insert on users
          for each row
              begin
          if :new.user_id is null then
              select users_id_seq.nextval into :new.user_id from dual;
          end if;
end;
/

DROP SEQUENCE villages_id_seq;
/
CREATE SEQUENCE villages_id_seq
MINVALUE 1
MAXVALUE 999999999999999999999999999
START WITH 1
INCREMENT BY 1
NOCACHE; 
/ 
CREATE OR REPLACE TRIGGER villages_id_trg
          before insert on villages
          for each row
              begin
          if :new.village_id is null then
              select villages_id_seq.nextval into :new.village_id from dual;
          end if;
end;
/
DROP SEQUENCE Leaderboard_id_seq;
/
CREATE SEQUENCE Leaderboard_id_seq
MINVALUE 1
MAXVALUE 999999999999999999999999999
START WITH 1
INCREMENT BY 1
NOCACHE; 
/ 
CREATE OR REPLACE TRIGGER Leaderboard_id_trg
          before insert on Leaderboard
          for each row
              begin
          if :new.leaderboard_id is null then
              select Leaderboard_id_seq.nextval into :new.leaderboard_id from dual;
          end if;
end;
/
DROP SEQUENCE createTroops_id_seq;
/
CREATE SEQUENCE createTroops_id_seq
MINVALUE 1
MAXVALUE 999999999999999999999999999
START WITH 1
INCREMENT BY 1
NOCACHE; 
/ 
CREATE OR REPLACE TRIGGER createTroops_id_trg
          before insert on createTroops
          for each row
              begin
          if :new.id is null then
              select createTroops_id_seq.nextval into :new.id from dual;
          end if;
end;
/
DROP SEQUENCE build_id_seq;
/
CREATE SEQUENCE build_id_seq
MINVALUE 1
MAXVALUE 999999999999999999999999999
START WITH 1
INCREMENT BY 1
NOCACHE; 
/ 
CREATE OR REPLACE TRIGGER build_id_trg
          before insert on build
          for each row
              begin
          if :new.id is null then
              select build_id_seq.nextval into :new.id from dual;
          end if;
end;
/
DROP SEQUENCE commands_id_seq;
/
CREATE SEQUENCE commands_id_seq
MINVALUE 1
MAXVALUE 999999999999999999999999999
START WITH 1
INCREMENT BY 1
NOCACHE; 
/ 
CREATE OR REPLACE TRIGGER commands_id_trg
          before insert on commands
          for each row
              begin
          if :new.id is null then
              select commands_id_seq.nextval into :new.id from dual;
          end if;
end;
/
DROP SEQUENCE reports_id_seq;
/
CREATE SEQUENCE reports_id_seq
MINVALUE 1
MAXVALUE 999999999999999999999999999
START WITH 1
INCREMENT BY 1
NOCACHE; 
/ 
CREATE OR REPLACE TRIGGER reports_id_trg
          before insert on reports
          for each row
              begin
          if :new.id is null then
              select reports_id_seq.nextval into :new.id from dual;
          end if;
end;
/
insert into users(user_id,username,user_password,new_report,birthday,data_inregistrare,general_points,battle_points) values (1,'Barbar','qwerty',0,current_timestamp,current_timestamp,0,0);
