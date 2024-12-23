# COMP3278-Project

## Database Setup

- **tables.sql**  
  - Create the SQL tables according to the given schema and ER diagram.

- **data.sql**  
  - Contains a list of designed database insertions that satisfy all the referential constraints.

## Artist Management

- **artists.php**  
  - Show a table of all artists who have held events in 703 Mallory St.  
  - The artists' names and genders would be shown.  
  - The table would be ordered by name followed by artist_id (both ascendingly).  
  - Each artist name is displayed as a hyperlink. When clicked, the user would see all their events (**artist_events.php**).

- **artist_events.php**  
  - Show a table of all the events performed by the selected artist.  
  - The event name, address, and schedule would be displayed.  
  - The table would be ordered by schedule descendingly followed by event_id ascendingly.

## Event Management

- **search.php**  
  - Displays a search box that allows the user to search for events.  
  - Events are searched based on matching subwords.

- **search_result.php**  
  - Display the details of all the matches from the searched event.  
  - The event name, address, and schedule are displayed.  
  - The result is ordered by name followed by event_id (both ascendingly).

- **events.php**  
  - Display all the events in the database.  
  - The event name, address, schedule, and number of performers are displayed.  
  - The result is ordered by name followed by event_id (both ascending
 
- **view_event.php**  
  - Show a detailed summary of the clicked event.

- **manage_events.php**  
  - Show a table of the event similar to **events.php** (without the number of performers).  
  - However, the individual performers are also listed.  
  - A form is used to allow users to add new artists that participated in that event.

## SQL Query Interface

- **add_artist.php**  
  - Shows the form that allows users to select and submit the artist.  
  - The form is a drop-down list of all the artists not in that event.

- **save_artist.php**  
  - Update the event information with the newly added artist.

- **show_sql.php**  
  - SQL query interface with 3 preset queries that allow the user to select and execute a query.

- **execute_sql.php**  
  - Executes the selected SQL code.
