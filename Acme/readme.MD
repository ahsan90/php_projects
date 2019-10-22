---------------------:Problem Description:-----------------------
-----------------------------------------------------------------

You are beginning to feel some measure of success as a programmer at Acme International and you're using your knowledge of PHP to make websites do things that would be impossible with static HTML alone.

Your next project arrives in the form of a basket of vegetables on your desk.  Attached to a potato is a print out. It reads:

Hey!

Great job on the booking form page, now I've got a new project for you.  A local client needs to take his static web page for ordering organic vegetables and build a dynamic page.  He doesn't have much money to spend, so we are going to write orders to a flat file.  He is also going to need a page that he can go to that will display his orders.

He has already met with Sharron, so we've got a specification already assembled. Here are the details:

The customer will go to a form page where they can enter an order for vegetables. The file will be called orderVegetables.php. Here are products a customer can order:

5 lb Potatoes, $6.00 each
3 lb Carrots, $3.75 each
1 Cauliflower, $4.00 each

The customer should be able choose a quantity of items beside any of the vegetable options.  Only allow orders where there is at least one thing ordered.  Also, if the total price is over $50 then they qualify for free delivery, otherwise delivery cost is $5.00. (You can apply the delivery fee after tax, or before - doesn't matter to me)  Be sure to also capture the customers name, email and phone number on the form so the client can contact them to setup delivery.  Make sure each order has the date and time of the order as well. Don't forget to use \r\n for a new line at the end of each record. 

When the user clicks 'submit,' a POST request is made to processVeggies.php where the order is written to the file veggie-orders.txt.  The text file should be simply a storage place in lieu of using a proper database. Some would call it a 'flat-file' storage system. Make sure to lock the file before appending, and to unlock it afterwards.  Display a thank you message to the client and print their order details to the screen.  Let them know that they will be contacted within the next business day.

Of course the client would like a page to view all the orders. This file will be called viewOrders.php.  The client would like a link on this page to reset the orders (reset the veggie-orders.txt file) called Reset Orders. This link will call a file resetOrders.php. The client will typically print off a days worth of orders and then reset the form for the next day. Don't worry about locking the file on your reset page. 

Good luck!  We need this prototype soon!

- Ima Plant

Senior Consultant,
Acme International Inc.

==============================================


Rquirements:

1. The input page (named orderVegetables.php) needs to have the following fields:
	i. Select drop-down fields should be used to allow users to choose a quantity for each item. Limit the options to 0-30. 
	ii. We also need fields for name, email, and phone number.

2. Look and Feel: Use bootstrap or not, your choice. The header of each page should contain a masthead/header image that would befit an upscale veggie shop. Please use GIMP, MS PAINT or some other editor to create this header image for the top of your page. Or better yet, set your header text using <h1> or <h2> and set the image you create as a background-image in your CSS. As well, all formatting should be done using CSS in an external stylesheet. Please use a div with an id of 'container' to hold your content. Ensure that this simple theme is present for ALL of your pages!

3. The processing page (named processVeggies.php) needs to include the following:
	i. Order details gathered from input form.
	ii. Whether or not delivery is free - display a message to the user one way or the other (include dollar sign and two decimal places - that is, format for currency)
	iii. Assume a provincial tax rate of 15%
	iv. Calculate and display the details of their order, net amount before tax, tax amount, delivery amount, and total amount.
	v.Include the time, date, and year (for Atlantic Canada) that the order was processed.
	vi.Ensure that there is some type of validation on the processing page. If someone tried to run it without accessing the form page first, it should give the user a link back to the order page.

4. The processing page (processVeggies.php) should also write this order to a file.
	i. Ensure file is accessible to your script, but hidden from public browsing. Please note that veggie-orders.txt MUST be stored one directory behind your publishing directory. "$DOCUMENT_ROOT/../veggie-orders.txt" would be an example. 
	ii. Orders file should be delimited by a "\t" or some other delimiter. " \r\n" at the end of each line.

5. The viewOrders.php page should open the file for reading only and display, in html, all of the pending orders for the day. The look and feel of this page should follow the store's theme. Though this page would be used only by administrators of the site, we will not lock it down. For now, assume it will be live for all to view. Please create a table to hold all of the pending orders. Each line of the order file could be a table row. You can keep this simple, no need to use explode() or list() if you don't want to. As well on this page, create a hyperlink to resetOrders.php (see below). If there are no pending orders, ensure there is a message to the user stating the fact.

6. Create another page called resetOrders.php. This page should reset the orders file (delete the file contents), give the user confirmation that the file has been cleared and give them a link/instructions on what to do next.

7. All pages should be accessible via links. So there should be some sort of menu. Use an include file to have your menu of links appear on each page for full marks. I DON'T need a link to process orders as that would be silly. Remember menus should go at the top of your pages.



