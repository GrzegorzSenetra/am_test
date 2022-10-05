# Łowca znaków
[]: # (c) 2022 by [Grzegorz Senetra]

## Installation:

To install you need to import postgreSQL database from ./dbpostgres file.

## Table schema and sample data:

```sh
 public | categories                 | table    | postgres
 public | categories_id_category_seq | sequence | postgres
 public | p_objects                  | table    | postgres
 public | p_objects_id_p_object_seq  | sequence | postgres
 public | pictures                   | table    | postgres
 public | pictures_id_picture_seq    | sequence | postgres


postgres=# select * from categories;
 id_category |    name     
-------------+-------------
           1 | test
           2 | test123
           3 | testa
           4 | deye
           5 | csad
           6 | fsafda
           7 | dsac
           8 | cdsa
           9 | csca
          10 | cxzczxvxz
          11 | vcxzvabdbab


postgres=# select * from p_objects;

id_p_object | id_category | id_picture |     x      |     y      |  w  |  h  | category_name 
-------------+-------------+------------+------------+------------+-----+-----+---------------
         154 |           1 |          3 |        631 |  88.609375 | 187 | 222 | test
         358 |           1 |         14 |        250 | 120.609375 |  92 |  75 | test
         156 |           1 |          2 |        474 |  79.609375 |  95 | 263 | test
         157 |           7 |          2 |        270 |  44.609375 |  47 |  45 | dsac
         158 |           1 |          1 |         82 |  13.609375 | 111 | 271 | test
         392 |           1 |         15 |      421.5 | 345.609375 | 177 | 107 | test
         393 |           1 |         15 |      723.5 | 327.609375 | 238 |  63 | test
         394 |           1 |         15 |      657.5 | 586.609375 | 373 | 279 | test
         662 |          13 |         18 | 618.515625 | 331.609375 | 114 |  69 | samochód
         663 |          13 |         18 | 242.515625 | 320.609375 | 115 |  92 | samochód
         664 |          13 |         18 | 112.515625 | 212.609375 |  61 | 213 | samochód
         665 |          13 |         18 | 112.515625 | 212.609375 |  61 | 213 | samochód

postgres=# select * from pictures;
 id_picture |                file_path                | p_objects 
------------+-----------------------------------------+-----------
         18 | Screenshot from 2022-10-05 00-08-32.png | 
         19 | Screenshot from 2022-10-05 00-09-13.png | 
(2 rows)

```

