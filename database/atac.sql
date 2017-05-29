CREATE OR REPLACE PROCEDURE atac(id_atacator int ,id_aparator int,p_spear int,p_axe int,p_sword int,p_archer int,cod_stare out int) as
spear int;
axe int;
sword int;
archer int;
timp_deplasare int;
timp_total TIMESTAMP(6);
units varchar(100);
begin
      select troop_number into spear from villagetroops where village_id=id_atacator and troop_id=1;
      select troop_number into axe from villagetroops where village_id=id_atacator and troop_id=2;
      select troop_number into sword from villagetroops where village_id=id_atacator and troop_id=3;
      select troop_number into archer from villagetroops where village_id=id_atacator and troop_id=4;
  if spear<p_spear or axe<p_axe or sword<p_sword or archer < p_archer or p_spear<0 or p_axe<0 or p_sword<0 or p_archer<0 or (p_spear+p_axe+p_sword+p_archer)=0
  then
  cod_stare :=-1;
  else
        update villagetroops set troop_number = troop_number-p_spear where village_id=id_atacator and troop_id=1;
        update villagetroops set troop_number = troop_number-p_axe where village_id=id_atacator and troop_id=2;
        update villagetroops set troop_number = troop_number-p_sword where village_id=id_atacator and troop_id=3;
        update villagetroops set troop_number = troop_number-p_archer where village_id=id_atacator and troop_id=4;
        
        timp_deplasare := timp(id_atacator,id_aparator);
        
        units:=p_spear||' '||p_axe||' '||p_sword||' '||p_archer;
        
         select current_timestamp + numToDSInterval( timp_deplasare, 'second' ) INTO timp_total from dual;
         
        insert into commands(from_village,to_village,units,command_type,start_time,arrive_time) values (id_atacator,id_aparator,units,'attack',current_timestamp,timp_total);
        cod_stare:=1;
  end if;

end;


