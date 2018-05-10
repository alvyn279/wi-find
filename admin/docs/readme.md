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
### Classes and folders in `admin/app/` 
- `ConfigEnum.php` contains constant variables necessary for connecting to a MySQL database
- `DatabaseConfiguration.php` has a constructor that requires `ConfigEnum` constants
```
        $config = new DatabaseConfiguration(
            ConfigEnum::DB_HOST,
            ConfigEnum::DB_PORT,
            ConfigEnum::DB_NAME,
            ConfigEnum::DB_USER,
            ConfigEnum::DB_PASSWORD
        );
```  
- `DatabaseConnection.php` is a singleton that accepts `DatabaseConfiguration` object as a parameter to connect to a MySQL database
```
$connection = new DatabaseConnection($config);
$instance = $connection->getInstance();
```
- `admin/app/controllers` often used to handle AJAX request coming from the application or views
```
// see url
var DeleteItems = {
    modalSuccess: function (response) { ... },
    request: function (selectedItems) {
        $.ajax({
            url: 'app/controllers/manage_deletion.php',
            type: 'post',
            data: {items: selectedItems, deletion: true}
        }).done(function (response) {
            actions.delete().modalId.modal('hide');
            DeleteItems.modalSuccess(response);
        });
    },
    main: function () { ... }
};
```
- `admin/app/models` are model objects often used as a parameter in `dao` methods, can be associated with creating, and editing a record in a database table
- `admin/app/handlers` classes act as an intermediary between `dao` classes and the application (view)
```
// each handlers class extends its corresponding dao classes
class AdminDao { ... }
class HandleAdmin extends AdminDao { ... }
// example usage
$connection = new DatabaseConnection($config);
$hws= new HandleWifiSpots($connection);
$hws->getItemById($itemId);
```
- `admin/app/dao` classes 
  - act as an intermediary between `handlers` classes and the database
  - often used to access data, delete, and edit data from the storage, 
 