# BudgetApp

README FILE:

A: How to create Google App

Prerequisites: 
you need the following prerequisites:

- PHP 5.4 or greater with the command-line interface (CLI) and JSON extension installed
- The Composer dependency management tool
- A Google account

Install the Google Client Library
use below command for download vendor folder, this command only work if you have Composer dependency management tool installed.

composer require google/apiclient:^2.0

A vendor folder will be download, there is a file name autoload.php in vendor folder, connect that file to config.php. 

1. Open https://console.developers.google.com/

2. On the navigation bar click on Add project button. 

3. You will redirect to a new page, provide the App name. Click on the Create button below.

4. Now select the Project from the navigation bar and go to the dashboard menu on the left side. Click on Enable APIs & Services button.

5. Using the Search bar, search for 'Google Sheets API' and Enable this service.

6. Then go to the dashboard and click on the library menu on the left side and again search for 'Google Drive API' from the search bar, click on Enable API.

7. Click on Credentials on the left side menu and click on the OAuth consent screen.

8. Choose the User Type as External and click on create.

9. Put the Application name as you would like in the 'Application name' field.

10. Put your domain name in the 'Authorized domains' field, add an Application Homepage link, then add Application Privacy Policy link.

11. Click on Save button and go to credentials, after that click on create credentials and select OAuth Client ID after that Choose Web Application and add the App URL or redirect URL in 'Authorized redirect URIs'

12. Click on the Create button. A pop up will be fired. Copy the Client ID and Client Secret.

Note: Client ID and Client Secret is sensitive. It will be used in config.php file.

B: How App is Working

1. Choose Number of Rooms

2. Select the Importance of Outdoor Living

3. The output will be shown below the Importance of Outdoor Living.

4. Click on Save button it will redirect you to the Google Authentication page. Give permission for the app to create a spreadsheet and access the files. 

5. After complete the above steps, it will redirect you to the app page, there will be a link for open the sheet below the save button. Click on that it will redirect you to the sheet which recently created with data fields. 
