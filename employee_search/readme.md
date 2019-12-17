-------------------:Problem Description:-------------------
-----------------------------------------------------------

You will create a page that will allow us to search for employees within the CIS2288 database. 

To begin, you must import the cis2288SourceDbFile.zip into your MySQL environment. How you do this is up to you.

The form page you will build must be called employeeSearch.php. 

The PHP page (for querying MySQL and displaying results) will be housed in employeeSearchResults.php. 

Provide the following search options on employeeSearch.php:

a.	This page should have a centered container <div> (id of employeeArea) to hold content (650px wide). The background of your page (body) should be slate grey and the background of your container <div> should be white. Please use a font size of 12px. Text and form items should be left aligned. Form should utilize a fieldset tag with a legend set to 'Employee Search'. Please use some bootstrap css to style your form. Perhaps apply some styles to the input fields, select boxes, and/or the submit button. Use an external style sheet.

b.	Allow a user to search using first and/or last name. Allow the search to be performed with empty fields for first and last name.We will allow a 'fuzzy search'. A search for Don should find Donald Bowers or Donnie Bowers. A search for Don Bowers should find Don Bowerson or Don Bowersberry. If you search without entering a first or last name, it should return all employees.

c.	Provide a select box to limit the number of return results. Options include 2, 5, 10, 15, all. The default should be 5.

d.	Provide a select box to order the result by. Options include employee id, first name, last name, start date The default should be last name.

e.	Provide a select box so the user can choose 'ascending' and 'descending'. Ascending is default.

f.	Submit the form request using GET.

Other items to consider:

1.	Display the search results (Employee ID, First Name, Last Name, Start Date) in a table with column headings (use <th> for heading tags, use same container and page formatting from the search page). Above the result table - add an h2 that says "Search Results".

2.	Each result will occupy one row in the table. Please use a 'zebra' type effect for the background colors on the table rows, this makes them easier to read. For the even rows please use white, for the odd rows use #DFDFE6. Set the table width to occupy the total width of the container it is in. Set the first and last name col widths to 30% each and the renaming col widths to 20%.

3.	Page titles should be present and be appropriate.

4.	If there are 0 results, please provide a message.

5.	Provide a link to return to the search page.

