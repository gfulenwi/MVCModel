# patternMVC
Implementation of the Model View Controller (MVC) Pattern in PHP

Controller.php <-- Front End Controller
ControllerAction <--- Base Class for Controllers


## Front Controller Flow
Controller.php

1. include ControllerAction and Controller Class Definitions

2. load Associative array of Controller Action Objects
3. Get Request Method and Page
4. Lookup Controller Action in Array  key[method + page]
5. Securty Access Check
6. Perform Action return next view page name
7. call render view method to insert page fragment in template

## ControllerAction Base Class
class **ControllerBase**(){
   private method;
   private page;
   private accessLevel;
   
   function action(){
   
      return nextView
   }
}
