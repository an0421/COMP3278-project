INSERT INTO dbprj_events (event_id, name, address, schedule) VALUES (1,'concert_1','Somewhere','2018-10-29 23:55');
INSERT INTO dbprj_events (event_id, name, address, schedule) VALUES (2,'concert_2','Somewhere','2018-10-29 23:55');
INSERT INTO dbprj_events (event_id, name, address, schedule) VALUES (3,'concert_3','Somewhere','2018-10-29 23:55');
INSERT INTO dbprj_events (event_id, name, address, schedule) VALUES (4,'talk_1','Somewhere','2018-10-29 23:55');
INSERT INTO dbprj_events (event_id, name, address, schedule) VALUES (5,'talk_2','Somewhere','2018-10-29 23:55');
INSERT INTO dbprj_events (event_id, name, address, schedule) VALUES (6,'other_1','Somewhere','2018-10-29 23:55');

INSERT INTO dbprj_concerts (event_id, conductor) VALUES (1,'Someone');
INSERT INTO dbprj_concerts (event_id, conductor) VALUES (2,'Someone');
INSERT INTO dbprj_concerts (event_id, conductor) VALUES (3,'Someone');

INSERT INTO dbprj_concerts_parts (event_id, part_id, pic) VALUES (2,1,'Someone');
INSERT INTO dbprj_concerts_parts (event_id, part_id, pic) VALUES (2,2,'Someone');
INSERT INTO dbprj_concerts_parts (event_id, part_id, pic) VALUES (3,1,'Someone');
INSERT INTO dbprj_concerts_parts (event_id, part_id, pic) VALUES (3,2,'Someone');
INSERT INTO dbprj_concerts_parts (event_id, part_id, pic) VALUES (3,3,'Someone');
INSERT INTO dbprj_concerts_parts (event_id, part_id, pic) VALUES (3,4,'Someone');

INSERT INTO dbprj_instruments (event_id, instrument) VALUES (1,'Instrument_1');
INSERT INTO dbprj_instruments (event_id, instrument) VALUES (2,'Instrument_1');
INSERT INTO dbprj_instruments (event_id, instrument) VALUES (2,'Instrument_2');
INSERT INTO dbprj_instruments (event_id, instrument) VALUES (3,'Instrument_1');
INSERT INTO dbprj_instruments (event_id, instrument) VALUES (3,'Instrument_2');
INSERT INTO dbprj_instruments (event_id, instrument) VALUES (3,'Instrument_3');

INSERT INTO dbprj_dramas (event_id, director) VALUES (4,'Someone');
INSERT INTO dbprj_dramas (event_id, director) VALUES (5,'Someone');

INSERT INTO dbprj_genres (event_id, genre) VALUES (4,'Something');
INSERT INTO dbprj_genres (event_id, genre) VALUES (5,'Something');

INSERT INTO dbprj_artists (artist_id, name, gender) VALUES (1,'Artist_1','male');
INSERT INTO dbprj_artists (artist_id, name, gender) VALUES (2,'Artist_2','female');
INSERT INTO dbprj_artists (artist_id, name, gender) VALUES (3,'Artist_3','other');

INSERT INTO dbprj_performs(artist_id, event_id) VALUES (1,1);
INSERT INTO dbprj_performs(artist_id, event_id) VALUES (1,2);
INSERT INTO dbprj_performs(artist_id, event_id) VALUES (1,3);
INSERT INTO dbprj_performs(artist_id, event_id) VALUES (1,4);
INSERT INTO dbprj_performs(artist_id, event_id) VALUES (1,5);
INSERT INTO dbprj_performs(artist_id, event_id) VALUES (1,6);
INSERT INTO dbprj_performs(artist_id, event_id) VALUES (2,1); 
