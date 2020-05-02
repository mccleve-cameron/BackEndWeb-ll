/*Host
ec2-54-227-245-146.compute-1.amazonaws.com

Database
d54ldp8o2hi2p6

User
xishlqtlnqqhqr

Port
5432

Password
a5599158f6b6bba85cd781c336281b6ac6e2d64a10097e5cec6281617ab2fc52

URI
postgres://xishlqtlnqqhqr:a5599158f6b6bba85cd781c336281b6ac6e2d64a10097e5cec6281617ab2fc52@ec2-54-227-245-146.compute-1.amazonaws.com:5432/d54ldp8o2hi2p6

Heroku CLI
heroku pg:psql postgresql-infinite-49543 --app arcane-harbor-53824
*/

CREATE SCHEMA teach_05;

CREATE TABLE teach_05.scriptures
(
    scriptures_id SERIAL,
    book          VARCHAR(30),
    chapter       INT,
    VERSE         INT,
    content       TEXT
);

INSERT INTO teach_05.scriptures
VALUES (DEFAULT, 'John', 1, 5, 'And the light shineth in darkness; and the darkness comprehended it not.');

INSERT INTO teach_05.scriptures
VALUES (DEFAULT, 'D & C', 88, 49, 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.');


INSERT INTO teach_05.scriptures
VALUES (DEFAULT, 'D & C', 93, 28, 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.');

INSERT INTO teach_05.scriptures
VALUES (DEFAULT, 'Mosiah', 16, 9, 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');




