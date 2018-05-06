### Admin pages
1. index.php: admin main entry point
2. view.php: a page to view a specific item
3. edit.php: a page to modify a specific item
4. login.php: admin login page

### Requirements
- index, view, and edit pages cannot be access without signing in
- use query string to get values of an item in view and edit page:
  - view.php?itemId=1
  - edit.php?itemId=1

### Order of imports
  1. classes in root `app/` directory
  2. classes in `app/models/`
  3. classes in `app/dao/`
  4. classes in `app/handlers/`
```
require 'app/ConfigEnum.php';
require 'app/DatabaseConfiguration.php';
require 'app/DatabaseConnection.php';
require 'app/models/WifiSpots.php';
require 'app/dao/WifiSpotsDao.php';
require 'app/handlers/HandleWifiSpots.php';
```  