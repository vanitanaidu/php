CREATE table brainstorm_problems (
	id int(11) not null PRIMARY KEY AUTO_INCREMENT,
  response_id int(11) not null,
  prob mediumtext not null,
  category mediumtext not null,
  source mediumtext not null,
  title mediumtext not null,
  status varchar(25),
  last_edit datetime
)


CREATE table brainstorm_responses (
	id int(11) not null PRIMARY KEY AUTO_INCREMENT,
  response_id int(11) not null,
  answer longtext not null,
  time time,
  user_id int(11),
  date date
)

CREATE table brainstorm_answers (
	id int(11) not null PRIMARY KEY AUTO_INCREMENT,
  response_id int(11) not null,
  answer longtext not null,
  last_edit date
)

INSERT INTO brainstorm_problems (brain_id, prob, category, source, title, status, last_edit)
VALUES ('4432', "But I must explain to you how all this mistaken idea of denouncing pleasure and
	praising pain was born and I will give you a complete account of the system, and expound the
	actual teachings of the great explorer of the truth, the master-builder of human happiness. No
	one rejects, dislikes, or avoids pleasure itself, because it is pleasure.", "Technology-Marketing",
	"TechCrunch-www.techcrunch.com", "Taking an Oath", "active", "2018-07-20")


ALTER TABLE brainstorm_problems CHANGE response_id brain_id int(11)

ALTER TABLE brainstorm_problems
ADD COLUMN num int(11) not null PRIMARY KEY AUTO_INCREMENT;

ALTER TABLE brainstorm_responses MODIFY num int(11)
