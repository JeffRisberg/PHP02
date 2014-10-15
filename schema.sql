drop table if exists orders;
drop table if exists users;
drop table if exists pizza_types;

create table pizza_types (
	id   int(11)      NOT NULL AUTO_INCREMENT,
	name varchar(255) NOT NULL,
	PRIMARY KEY (id)
)
	ENGINE =InnoDB
	DEFAULT CHARSET =latin1
	AUTO_INCREMENT =1;

create table users (
  id           int(11)      NOT NULL AUTO_INCREMENT,
  user_name    varchar(255) NOT NULL,
  password     varchar(255) NOT NULL,
  date_created datetime     NOT NULL,
  last_updated datetime     NOT NULL,
  PRIMARY KEY (id)
)
  ENGINE =InnoDB
  DEFAULT CHARSET =latin1
  AUTO_INCREMENT =1;

create table orders (
	id           int(11)      NOT NULL AUTO_INCREMENT,
	user_id      int(11)      NOT NULL,
	type_id      int(11)      NOT NULL,
	date_created datetime     NOT NULL,
	last_updated datetime     NOT NULL,
	PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES users (id),
	FOREIGN KEY (type_id) REFERENCES pizza_types (id)
)
	ENGINE =InnoDB
	DEFAULT CHARSET =latin1
	AUTO_INCREMENT =1;

insert into pizza_types (name) values ('Pepperoni');
insert into pizza_types (name) values ('Meat');
insert into pizza_types (name) values ('Hawaiian');

insert into users (user_name, password, date_created, last_updated) values ('Brandon', 'abcd', now(), now());
insert into users (user_name, password, date_created, last_updated) values ('Jeffrey', 'abcd', now(), now());
insert into users (user_name, password, date_created, last_updated) values ('Lauren', 'abcd', now(), now());

insert into orders (user_id, type_id, date_created, last_updated) values (1, 2, now(), now());
insert into orders (user_id, type_id, date_created, last_updated) values (2, 3, now(), now());
