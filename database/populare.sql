--Populare tabela Map
declare
begin
for i in 1 .. 100 loop
  for j in 1 .. 100 loop
    insert into map(coord_x,coord_y,tip)
    values(i,j,0);
  end loop;
end loop;
end;
/
--Populare TABELA LEADERBOARD
declare
begin
 insert into leaderboard(leaderboard_id,title)
 values (1,'Top Population');
  insert into leaderboard(leaderboard_id,title)
 values (2,'Top Attackers');
end;
/
--POPULARE TABELA TROOPS
declare
begin
 Insert into Troops(troop_id,troop_name,troop_attackPower,troop_defensePower,troop_stone_cost,troop_wood_cost,troop_iron_cost,troop_time)
 values (1,'Spear',20,10,30,20,40,35);
  Insert into Troops(troop_id,troop_name,troop_attackPower,troop_defensePower,troop_stone_cost,troop_wood_cost,troop_iron_cost,troop_time)
 values (2,'Axe',30,5,50,25,30,60);
   Insert into Troops(troop_id,troop_name,troop_attackPower,troop_defensePower,troop_stone_cost,troop_wood_cost,troop_iron_cost,troop_time)
 values (3,'Sword',15,50,20,60,15,45);
   Insert into Troops(troop_id,troop_name,troop_attackPower,troop_defensePower,troop_stone_cost,troop_wood_cost,troop_iron_cost,troop_time)
 values (4,'Archer',10,45,15,40,30,35);
end;
/
--POPULARE TABELA BUILDINGS
declare
begin
insert into Buildings values (1,'Main building',25,500,360);
insert into Buildings values (2,'Wall',10,100,120);
insert into Buildings values (3,'Barracks',50,180,250);
insert into Buildings values (4,'Stone',10,70,120);
insert into Buildings values (5,'Wood',10,70,120);
insert into Buildings values (6,'Iron',10,70,120);
insert into Buildings values (7,'Storage',50,150,360);
end;
/
--POPULARE TABELA RESOURCES
declare
begin
 insert into resources values (1,'Stone');
   insert into resources values (2,'Wood');
    insert into resources values (3,'Iron');
end;



