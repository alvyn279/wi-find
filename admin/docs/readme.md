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
  