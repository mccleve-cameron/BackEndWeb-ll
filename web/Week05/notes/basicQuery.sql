
CREATE TABLE note_user (
  id SERIAL,
  username VARCHAR(255),
  password VARCHAR(255),
  PRIMARY KEY (id)
);

CREATE TABLE note (
  id SERIAL,
  userId INT NOT NULL,
  content TEXT,
  PRIMARY KEY (id),
  FOREIGN KEY (userId) REFERENCES note_user (id)
);

INSERT INTO note_user (username, password) VALUES ('john', 'pass');
INSERT INTO note_user (username, password) VALUES ('jane', 'byui');

INSERT INTO note (userId, content) VALUES (1, 'A note for John');
INSERT INTO note (userId, content) VALUES (1, 'Another note for John');
INSERT INTO note (userId, content) VALUES (2, 'And this is a note for Jane');

SELECT * FROM note_user;

SELECT * FROM note_user WHERE username = 'john';
SELECT * FROM note_user WHERE id > 1;
SELECT * FROM note_user ORDER BY username;
SELECT * FROM note_user ORDER BY username DESC;

/*But suppose we only wanted the notes for the user ‘john.’ 
We could add a where clause to our query like so:*/
SELECT * FROM note where userID = 1;

/*But this requires us to first find out John's userId, 
if we only know his username. A better approach is to “join” 
the tables together on the matching column (in this case userId) 
to temporarily make one big table that has the user information 
and the note information in it. Then we can use the username in 
the where clause. The syntax of joining tables is as follows.

SELECT columns
  FROM table1
  JOIN table2
  ON columnFromTable1 = columnFromTable2;

Then we can of course add other clauses afterward. While this works 
because these two tables may have columns with the same names, 
it is useful to give them aliases so that we can say which table we mean.

SELECT columns
  FROM table1 AS t1
  JOIN table2 AS t2
  ON t1.column = t2.column;

The aliases t1, and t2 can then be used in other places in the query 
such as the columns that will be selected. Using the join syntax, 
we can join the user and note table together and return all rows 
and all columns from the big temporary table.*/

SELECT * FROM note_user AS u 
JOIN note AS n 
ON u.id = n.userId;

/*just show johns rows*/
SELECT * FROM note_user AS u 
JOIN note AS n 
ON u.id = n.userId 
WHERE u.username = 'john'; 

/*only show johns notes*/
SELECT n.content FROM note_user AS u 
JOIN note AS n 
ON u.id = n.userId 
WHERE u.username = 'john';
