# dbprj_events (event_id: INT, name: VARCHAR(200), address: VARCHAR(200), 
#               schedule: DATETIME)

CREATE TABLE dbprj_events (
  event_id INT NOT NULL,
  name VARCHAR(200) NOT NULL,
  address VARCHAR(200) NOT NULL,
  schedule DATETIME NOT NULL,
  PRIMARY KEY(event_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# dbprj_concerts (event_id: INT, conductor: VARCHAR(200))
# Foreign keys: {event_id} to dbprj_events

CREATE TABLE dbprj_concerts (
  event_id INT NOT NULL,
  conductor VARCHAR(200) NOT NULL,
  PRIMARY KEY(event_id),
  FOREIGN KEY(event_id) REFERENCES dbprj_events(event_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# dbprj_dramas (event_id: INT, director: VARCHAR(200))
# Foreign keys: {event_id} to dbprj_events

CREATE TABLE dbprj_dramas (
  event_id INT NOT NULL,
  director VARCHAR(200) NOT NULL,
  PRIMARY KEY(event_id),
  FOREIGN KEY(event_id) REFERENCES dbprj_events(event_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# dbprj_instruments (event_id: INT, instrument: VARCHAR(200))
# Foreign keys: {event_id} to dbprj_concerts

CREATE TABLE dbprj_instruments (
  event_id INT NOT NULL,
  instrument VARCHAR(200) NOT NULL,
  PRIMARY KEY(event_id, instrument),
  FOREIGN KEY(event_id) REFERENCES dbprj_concerts(event_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# dbprj_genres (event_id: INT, genre: VARCHAR(200))
# Foreign keys: {event_id} to dbprj_dramas

CREATE TABLE dbprj_genres (
  event_id INT NOT NULL,
  genre VARCHAR(200) NOT NULL,
  PRIMARY KEY(event_id, genre),
  FOREIGN KEY(event_id) REFERENCES dbprj_dramas(event_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# dbprj_concerts_parts(event_id: INT, part_id: INT, pic: VARCHAR(200))
# Foreign keys: {event_id} to dbprj_concerts

CREATE TABLE dbprj_concerts_parts (
  event_id INT NOT NULL,
  part_id INT NOT NULL,
  pic VARCHAR(200) NOT NULL,
  PRIMARY KEY(event_id, part_id),
  FOREIGN KEY(event_id) REFERENCES dbprj_concerts(event_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# dbprj_artists (artist_id: INT, name: VARCHAR(200), 
#                gender: ENUM('male', 'female', 'other'))

CREATE TABLE dbprj_artists (
  artist_id INT NOT NULL,
  name VARCHAR(200) NOT NULL,
  gender ENUM('male', 'female', 'other') NOT NULL,
  PRIMARY KEY(artist_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# dbprj_performs (artist_id: INT, event_id: INT)
# Foreign keys: {artist_id} to dbprj_artists, {event_id} to dbprj_events

CREATE TABLE dbprj_performs (
  artist_id INT NOT NULL,
  event_id INT NOT NULL,
  PRIMARY KEY(artist_id, event_id),
  FOREIGN KEY(artist_id) REFERENCES dbprj_artists(artist_id),
  FOREIGN KEY(event_id) REFERENCES dbprj_events(event_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
