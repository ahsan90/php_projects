----------------------:Problem Description:--------------------
---------------------------------------------------------------

The local government has hired your company to build a web application that will allow users to book cottages and hotel rooms online.

Here are the rules:

1. The room booking page (named bookRoom.php) needs to have the following:
	
	i. We need fields and labels for first name, last name, postal code (text boxes), as well as address (text area). All fields will be required.
	
	ii. Display the unit rental cost (use $100/night) somewhere on the form.
	
	iii. The user must be able to enter the number of adults and the number of children (text boxes) in their party. (At least one adult required).

    iv. The user can tick a checkbox to declare that a pet will be staying in the room. There should be a message here telling the user there is a $50 extra charge for pets. 
	
	v. A drop down/select box (select, please provide numbers/options from 1 - 7) for the number of nights they would like to stay - don't worry about choosing dates, just provide a box for the number of nights.
 
2.	All content should be inside a div with an id of bookingForm and a width of 700px. Inside the div at the top there should be a header (h1, centered) that reads "Booking Form". Find a photo of an interesting looking cottage you might like to book. Place the photo in the center of the page below the h1, but above the booking form. As well, all formatting should be done using CSS and not using html attributes (bgcolor, <center>, <font>). <table> tags are ok. The form content should be left aligned within the div. Both display pages should utilize Bootstrap css. Ensure you use the bootstrap classes for image, table, and form elements.

3. The output page (named processBooking.php) needs to include/display/calculate the following:

	i. All content here should be inside a div with an id of bookingResults and a width of 700px. All content should be left aligned, except for a header (h1) that says "Booking Confirmation" which is centered inside the top of the div. Remember Bootstrap. 
	
	ii. If the user has not entered name, address, and postal code, or has not entered a number of nights, or has not entered at least 1 adult, DO NOT calculate anything. Simply display a message that informs them they need to go back and enter the missing information. Provide a link back to the previous page. 
	
	iii. If they have entered all of the required data, display the customers name, address, and postal code.

	iv. Display the number of adults and children in their party. If the total number of people (children+adults) is over 8, please add a line that says something to the effect of, "Note: You have a large party, some guests may have to sleep on the floor".
	
	v. If they are bringing a pet along, charge an extra $50 and display a line of text that says that $50 has been added. Use isset() to see if the checkbox was checked.
	
	vi. Use 15% as provincial sales tax amount and store it as a defined constant
    
	vii. Display the unit rental cost (100*the number of nights), the tax amount, any pet charges, and the final Grand Total. This should be displayed in a tidy table. 

	viii. Please display the following message (using the PHP date function), including current time, date, and year for Atlantic Canada in this format (Booking created at 2:34pm on September 25, 2018). Don't forget to set the timezone to ensure that the time is accurate.
