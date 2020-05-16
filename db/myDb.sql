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


SELECT * FROM users;
SELECT * FROM goals;
SELECT * FROM habits;
