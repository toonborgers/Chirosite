alter table leiding_rol ADD CONSTRAINT fk_1 FOREIGN KEY (leiding_id) REFERENCES leiding (id);
alter table leiding_rol ADD CONSTRAINT fk_2 FOREIGN KEY (rol_id) REFERENCES rol (id);

alter table leiding_groep ADD CONSTRAINT fk_3 FOREIGN KEY (leiding_id) REFERENCES leiding (id);
alter table leiding_groep ADD CONSTRAINT fk_4 FOREIGN KEY (groep_id) REFERENCES groep (id);

alter table programma add constraint fk_5 foreign key (groep_id) REFERENCES groep (id);