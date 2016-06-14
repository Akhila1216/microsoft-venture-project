Project for microsoft ventures includes the following features

As per the requirement the entire project is written in PHP. I have not added client side validations in javascript,
 as I needed to brush up my knowledge on PHP and mySQL and then work on the project.

Steps to run

1. Database connection creds are hard-coded in the code - username:root, hostname:localhost, host:127.0.0.1
2. Import the database contact management and run 'php -S localhost:8000' from the root of the folder.
3. go to http://localhost:8000
4. Login using username: akhila.kapse@gmail.com, password: Akhila12!, will open Lists.php
5. Any link in the page is a link to a form except "logout" (clicking on a specific category, contact will lead to an edit form)
6. Clicking on links on left-top corner opens forms to create new category and contacts.
7. In order to have some client side validation, I have used HTML 5 "required" attribute, and type="email" for email, type="number" for phone number
and maxlength of 10.