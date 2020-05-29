DROP TABLE users;
DROP TABLE goals;
DROP TABLE habits;


CREATE TABLE users (
    id SERIAL NOT NULL PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL
);

CREATE TABLE goals (
    id SERIAL NOT NULL PRIMARY KEY,
    goal_text TEXT NOT NULL,
    is_complete BOOLEAN NOT NULL,
    goal_date DATE NOT NULL,
    user_id INT NOT NULL REFERENCES users(id) 
);

CREATE TABLE habits (
    id SERIAL NOT NULL PRIMARY KEY,
    habit_text TEXT NOT NULL,
    is_complete BOOLEAN NOT NULL,
    habit_date SMALLINT NOT NULL,
    user_id INT NOT NULL REFERENCES users(id)
);

INSERT INTO users VALUES (DEFAULT, 'Bob', 'bob1');
INSERT INTO users VALUES (DEFAULT,'John', 'john1');
INSERT INTO users VALUES (DEFAULT,'Sue', 'sue1');
INSERT INTO users VALUES (DEFAULT,'Joe', 'joe1');

--inserts using todays date
INSERT INTO goals VALUES (DEFAULT, 'take out trash', FALSE, CURRENT_DATE, 1);
--inserts using manual date
INSERT INTO goals VALUES (DEFAULT, 'wash dishes', FALSE, '2020-05-23', 1);
INSERT INTO goals VALUES (DEFAULT, 'clean room', FALSE, '2020-05-24', 2);
INSERT INTO goals VALUES (DEFAULT, 'clean room', FALSE, '2020-05-20', 3);
INSERT INTO goals VALUES (DEFAULT, 'apply for internship', TRUE, '2020-05-20', 4);
INSERT INTO goals VALUES (DEFAULT, 'sweep floor', FALSE, '2020-05-20', 4);
INSERT INTO goals VALUES (DEFAULT, 'finish HW', FALSE, '2020-05-20', 4);
---User 1 habits
INSERT INTO habits VALUES (DEFAULT, 'work-out', FALSE, 6, 1);
INSERT INTO habits VALUES (DEFAULT, 'run', FALSE, 3, 1);
INSERT INTO habits VALUES (DEFAULT, 'read for 30min', FALSE, 7, 1);
---User 2 habits
INSERT INTO habits VALUES (DEFAULT, 'swim 100 meters', TRUE, 3, 2);
INSERT INTO habits VALUES (DEFAULT, 'brush teeth', FALSE, 7, 2);
INSERT INTO habits VALUES (DEFAULT, 'read for 30min', FALSE, 7, 2);
---User 3 habits
INSERT INTO habits VALUES (DEFAULT, 'jog 1 mile', TRUE, 3, 3);
INSERT INTO habits VALUES (DEFAULT, 'work on HW 2hrs', FALSE, 6, 3);
INSERT INTO habits VALUES (DEFAULT, 'compliment someone', FALSE, 7, 3);
---User 4 habits
INSERT INTO habits VALUES (DEFAULT, 'make my bed', FALSE, 7, 4);
INSERT INTO habits VALUES (DEFAULT, 'exercise 1hr', FALSE, 6, 4);
INSERT INTO habits VALUES (DEFAULT, 'read scriptures', FALSE, 7, 4);

SELECT * FROM users AS u 
JOIN goals AS g 
ON u.id = g.user_id;

SELECT * FROM users AS u 
JOIN goals AS g 
ON u.id = g.user_id
WHERE username='John';

SELECT * FROM users;
SELECT * FROM goals;
SELECT * FROM habits;
