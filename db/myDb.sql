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

--inserts using todays date
INSERT INTO goals VALUES (DEFAULT, 'take out trash', FALSE, CURRENT_DATE, 1);
--inserts using manual date
INSERT INTO goals VALUES (DEFAULT, 'wash dishes', FALSE, '2020-05-23', 1);
INSERT INTO goals VALUES (DEFAULT, 'clean room', FALSE, '2020-05-24', 2);
INSERT INTO goals VALUES (DEFAULT, 'clean room', FALSE, '2020-05-20', 3);

SELECT * FROM users;
SELECT * FROM goals;
SELECT * FROM habits;
