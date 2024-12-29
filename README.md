# COMP3278-Project

## Database Setup

- **tables.sql**  
  - Create the SQL tables according to the given schema and ER diagram.

- **data.sql**  
  - Contains a list of designed database insertions that satisfy all the referential constraints.

## Artist Management

- **artists.php**
  - <img width="397" alt="Screenshot 2024-12-30 at 1 03 24 AM" src="https://github.com/user-attachments/assets/ec37604b-41b9-46ff-b5a2-0de243c054e4" style="width:50%; height:50%;"/>

  - Show a table of all artists who have held events in 703 Mallory St.  
  - The artists' names and genders would be shown.  
  - The table would be ordered by name followed by artist_id (both ascendingly).  
  - Each artist name is displayed as a hyperlink. When clicked, the user would see all their events (**artist_events.php**).

- **artist_events.php**
  - <img width="525" alt="Screenshot 2024-12-30 at 1 14 05 AM" src="https://github.com/user-attachments/assets/1c156fb6-c28b-4fa0-8247-93650afd539a" style="width:50%; height:50%;"/>

  - Show a table of all the events performed by the selected artist.  
  - The event name, address, and schedule would be displayed.  
  - The table would be ordered by schedule descendingly followed by event_id ascendingly.

## Event Management

- **search.php**
  - <img width="383" alt="Screenshot 2024-12-30 at 1 04 11 AM" src="https://github.com/user-attachments/assets/8ce7c3e9-404b-473f-8c46-7b59a1ddce44" style="width:50%; height:50%;"/>

  - Displays a search box that allows the user to search for events.  
  - Events are searched based on matching subwords.

- **search_result.php**
  - <img width="519" alt="Screenshot 2024-12-30 at 1 09 52 AM" src="https://github.com/user-attachments/assets/2c693780-4bf4-4f44-8cce-adc7b50e3726" style="width:50%; height:50%;"/>

  - Display the details of all the matches from the searched event.  
  - The event name, address, and schedule are displayed.  
  - The result is ordered by name followed by event_id (both ascendingly).

- **events.php**
  - <img width="623" alt="Screenshot 2024-12-30 at 1 05 02 AM" src="https://github.com/user-attachments/assets/4a879784-2988-405a-b720-60f4c637e2f7" style="width:50%; height:50%;"/>

  - Display all the events in the database.  
  - The event name, address, schedule, and number of performers are displayed.  
  - The result is ordered by name followed by event_id (both ascending
 
- **view_event.php**  
  - Show a detailed summary of the clicked event.

- **manage_events.php**
  - <img width="876" alt="Screenshot 2024-12-30 at 1 05 52 AM" src="https://github.com/user-attachments/assets/b7751c61-0251-4fae-8748-ad162e5263cb" style="width:50%; height:50%;"/>

  - Show a table of the event similar to **events.php** (without the number of performers).  
  - However, the individual performers are also listed.  
  - A form is used to allow users to add new artists that participated in that event.

## SQL Query Interface

- **add_artist.php**
  - <img width="401" alt="Screenshot 2024-12-30 at 1 07 10 AM" src="https://github.com/user-attachments/assets/5fff41ca-0990-43c7-9d26-1d7c727e03a9" style="width:50%; height:50%;"/>

  - Shows the form that allows users to select and submit the artist.  
  - The form is a drop-down list of all the artists not in that event.

- **save_artist.php**  
  - Update the event information with the newly added artist.

- **show_sql.php**
  - <img width="1146" alt="Screenshot 2024-12-30 at 1 07 41 AM" src="https://github.com/user-attachments/assets/fef97921-92a5-482f-a12b-691acfda6300" style="width:50%; height:50%;"/>

  - SQL query interface with 3 preset queries that allow the user to select and execute a query.

- **execute_sql.php**
  - <img width="300" alt="Screenshot 2024-12-30 at 1 08 21 AM" src="https://github.com/user-attachments/assets/88c716e0-f7e0-469a-b480-3d97822055e9" style="width:50%; height:50%;"/>

  - Executes the selected SQL code.
