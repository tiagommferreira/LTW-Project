CREATE TABLE users(
               ID INTEGER PRIMARY KEY NOT NULL,
               username VARCHAR( 50 ) NOT NULL,
               email VARCHAR( 250 ) NOT NULL,
               password VARCHAR( 150 ) NOT NULL);

CREATE TABLE polls_answers(
  ID INTEGER PRIMARY KEY NOT NULL,
  poll_id INTEGER NOT NULL REFERENCES polls(ID),
  answer VARCHAR(50) NOT NULL,
  votes INTEGER NOT NULL
);

CREATE TABLE user_polls(
  user_id INTEGER NOT NULL REFERENCES users(ID),
  polls_id INTEGER NOT NULL REFERENCES polls(ID),
  answered BOOLEAN NOT NULL,
  answer_id INTEGER REFERENCES polls_answer(ID)
);

CREATE TABLE polls(
  ID INTEGER PRIMARY KEY NOT NULL,
  topic VARCHAR(50) NOT NULL,
  question VARCHAR(300) NOT NULL,
);
