# Events Manager

This platform is used to create, manage, and track assistance of events.

# About

This project is designed as a Progressive Web App.  This means that the project is compatible with most computer web browsers, tablets, and mobile devices while not requiring licensing with Google or Apple to be deployed through their stores.

It consists of a Web Server component and a Database component.  The Web Server component is used to display a user interface and reporting.  The Database component is used to hold the data of interest.

Admin authentication is done through an Azure Active Directory.

Core web development technologies include:
  * HTML
  * CSS
  * JavaScript
  * PHP

Libraries/Frameworks used:
  * Bootstrap v.3.3.7 [Stable]
    * Bootstrap coding resources:

      http://getbootstrap.com/docs/3.3/components/#input-groups

      https://www.w3schools.com/Bootstrap/default.asp

  * jQuery-3

Important Considerations:

  * Links do not work like they do normally!
    The links' "href" property has been removed and replaced by a "link" property that is read by
    the JavaScript link handler function.
    This is done because we do not want a complete reload of a new page.  We just care about
    replacing the content of a DIV that represents the content of the pages.  We want to maintain the same navigation menu and footer.
    This also allows for better management of code in different locations without having a
    negative effect on others.

# The Team

  * Carlo Burgos
  * Jean Mendez
  * Emmanuel Munet
  * Joaquin Ortiz
  * Jorge Pabon
