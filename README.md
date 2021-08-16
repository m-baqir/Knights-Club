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
