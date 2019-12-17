------------------:Problem Description:--------------------
-----------------------------------------------------------


This is a simple php project which involves using the object oriented features of PHP to design a music album processing page.

First you will build a form page called addAlbum.php.  This form will contain text fields for album title, artist, publisher (Sony, BMI, etc.) and genre.  Add two more fields of your choice.  You will post this form to the file process.php.

If all the fields have values, we will create a new Album object and print the details of the object.  You will need to create an Album class that has private instance variables for all the fields just described. Your constructor should simply echo to the screen "Album created." If the user missed some of the form, give them a link to go back and fix.

Generate standard getters/setters

You will need to create __get and __set functions (magic functions) to allow us to set the properties of the instance variables from outside the class. You will also create a function (or method) called __toString() in the class.  Calling this will return a  a formatted string of all the details for the album.  Store the class in album.class.php.

Include a hyperlink back to add another album.

Sample output could look like this:

Album Created\
Album Title: Blaze of Glory\
Artist: Jon Bon Jovi\
Publisher: ASCAP\
Genre: Rock\
Custom Field: stuff\
Another Custom Field: stuff

Add another album!