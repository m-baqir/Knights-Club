# Knights Club
A social media platform that is currently a work in progress.
---
**Collaborators:**
- [Ahmed](https://github.com/a-hagar)
- [Suong](https://github.com/Suong-Tran)
- [Thai](https://github.com/thaivo)
- [Estevan](https://github.com/Estevan-C)
- [Vedanshi](https://github.com/Vedanshi15)

## Features

**Estevan Cordero**
- Newsletter Page
  - This page allows the user to filled out a form for a subscription news service. When submitted an email will be sent to the one submitted in the form.   
- Advice Page
  - Users or non login users can use the search bar on the page, and enter a subject of there choice to find certain advice store in the database. 
- User Profile Page
  - Home page of users login into the website. Non login user can only view the page, while login users can update their own page. 
- Bugs
  - There is a error when updating the user profile.
### **Mohammad Baqir**
- Subscription Page
  - This is the subscription page where the user is able to subscribe to a particular type of service. The information that fills the chart is pulled from the database. So far this is READY-ONLY code and the information in the chart can only be updated by updating the database.
- PayPal
  - Once the user selects a particular service, the website then connects to the PayPal API and allows for the payment to be sent to the merchat.
- RSS Feed
  - The RSS feed resides on the user profile page. It is a beautiful combination of AJAX, PHP and XML working together in unison. OnClick and selecting a subscription from the dropdown, PHP grabs the value of the dropdown and loads the rss.xml file to then find that particular subscription information and then returns it back to HTML to be presented in a DIV element. So far this is READ-ONLY but I would like to give the user the ability to add or delete more subscriptions.
### **Vedanshi Patel**
- Contact Us Page
  - Registered user can send messages through contact us page and data will store in database.
  - Admin can see all messages send by public user and reply them through their email address.
- FAQ
  - Admin can add FAQ questions and answers to the system.
  - Public can see list of FAQs.
- User Wall
  - Registered user can add post through this feature like any text, images or videos.
  
### **Thai Vo**
- Inbox page
  - Registered users can send/receive messages to/from the other user, and move list of messages to the trash. Additionally, messages are loaded asynchronously and periodically without refreshing inbox page.
- Friend request
  - Utilizing inbox feature to send a message for every friend request, and then receiver can accept that request by clicking accept button.
  - There is also a friend list page in the user profile.
- About us page.
  - Admin can create or update the content of about us page.
  - The other users can only see about us page.

### **Suong Tran**
- Image Gallery
  - User and others will be able to see their image in a gallery like environment. The user can also alter their gallery as much as they want.
  - 
- Notification
  - This will get all the unread message from the inbox feature and turn it into a popup dropdown list so that user can click on it to see the subject of the message as well as the name of the person who has sent it.
- Status.
  - User will be able to freely change the online status of themselve. Moreover, it will automatically change the user status to online whenever they login.

### **Ahmed Hagar**
- User Search
  - Search for users from the nav bar and be redirected to a results page
  - The results will show any members in our database that match the parameters the user inputs
- Login/Register
  - Users can register to our social network by filling out our registration form that will add them to our database
  - Existing users can simply login with their username or email and password to access their account
  - Client-side and server-side validation to verify only correct information can be inputted in order to allow sessions
- Site Map
  - All site pages are logged to a database table, divided between publicly-accessible pages and pages that can only be accessed after logging in
  - When visiting the site map, the pages shown are pulled by the database to show what pages are available to the vistor

