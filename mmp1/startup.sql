-- Multimedia Projekt 1
-- Multimedia Technology
-- Fachhochschule Salzburg
-- Niklas Clemens Noldin
-- fhs41321

DROP TABLE IF EXISTS assets;
DROP TABLE IF EXISTS feedback;
DROP TABLE IF EXISTS follows;
DROP TABLE IF EXISTS likes;
DROP TABLE IF EXISTS needsa;
DROP TABLE IF EXISTS concepts;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS courses;
DROP TABLE IF EXISTS universities;

CREATE TABLE universities(
	id SERIAL PRIMARY KEY,
	name VARCHAR NOT NULL,
	adress VARCHAR
);

CREATE TABLE courses(
	id SERIAL PRIMARY KEY,
	name VARCHAR NOT NULL,
	university INTEGER REFERENCES universities(id)
);

CREATE TABLE users (
	username VARCHAR(60) PRIMARY KEY,
	email VARCHAR NOT NULL,
	firstname VARCHAR(35),
	lastname VARCHAR(35),
	password VARCHAR(255),
	isfemale BOOLEAN,
	description text,
	course INTEGER REFERENCES courses(id) ON UPDATE CASCADE ON DELETE SET NULL,
	isadmin BOOLEAN,
	phone VARCHAR(20),
	facebook VARCHAR(50),
	skype VARCHAR(50),
	linkedin VARCHAR(50),
	memebersince TIMESTAMP
);

CREATE TABLE concepts(
	id SERIAL PRIMARY KEY,
	title VARCHAR NOT NULL,
	author VARCHAR(60) REFERENCES users(username) NOT NULL,
	description text,
	desc_short VARCHAR NOT NULL,
	creationdate TIMESTAMP
);

CREATE TABLE assets (
	id SERIAL PRIMARY KEY,
	title VARCHAR NOT NULL,
	username VARCHAR(60) REFERENCES users(username) NULL,
	concept INTEGER REFERENCES concepts(id) NULL
);

CREATE TABLE feedback(
	id SERIAL PRIMARY KEY,
	data TEXT,
	stars INTEGER CHECK (stars IN (0, 1, 2, 3, 4, 5)),
	creationdate TIMESTAMP
);

CREATE TABLE follows(
	follower VARCHAR(60) REFERENCES users(username),
	following VARCHAR(60) REFERENCES users(username)
);

CREATE TABLE likes(
	follower VARCHAR(60) REFERENCES users(username),
	conceptid INTEGER REFERENCES concepts(id)
);

CREATE TABLE needsa(
	conceptid INTEGER REFERENCES concepts(id),
	courseid INTEGER REFERENCES courses(id)
);

