Custom module to manage Site API key in the site.

As per the requirement, below tasks are created using this custom module:

A new text field named "Site API key" added to the "Site Information" form. 
Given "No API Key yet" as placeholder text for the field.
This field is given as a mandatory field.
When the form is submitted, this value saved as system variable named "siteapikey".
Drupal status message - Site API Key "myapikey123" has been saved - is diplayed ("myapikey123" is the 'Site API Key' value saved).
When the form is revisited, Site API key is populated in the field.
The "Save Configuration" button in the form is changed to "Update Configuration".
A URL "/jsonrepnode/{siteapikey}/{nid}" is provided to output JSON object of the node using the Site API key and node id. 
Using content type "page", it gives correct response when given with correct Site API key and node id.
When the Site API key is wrong, it gives response as "access denied".
When the node id is wrong, it gives response as 'not a node'.

Dependency:
Serialization module

Demo uRLs:
Site Inforamtion form:
http://localhost/mysite/admin/config/system/site-information

URL to provide JSON representation of a node:
http://localhost/mysite/jsonrepnode/{siteapikey}/{nodeid}

Reference:
https://www.drupal.org/
https://stackoverflow.com/

Time taken to develop and test:
6 man hours
