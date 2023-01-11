WHY NOT A GIF HERE? TO SET THE MODE.

# Southern Isles

Welcome to the lovely home island of Hans. The arctic isle located far far north. Enjoy the lively

# Hans´s Haven

A great hotel located on Southern Isles in the majestic Yrgopelago. A hotel built on the saga told about Hans from the movie "Frozen".

# Instructions

If your project requires some installation or similar, please inform your user 'bout it. For instance, if you want a more decent indentation of your .php files, you could edit [.editorconfig]('/.editorconfig').

# Code review

1. Consider the number of files. It is often good to split up code in several files to make it more readable, but if a large number of files are not put in a proper folder structure they can be quite hard to follow. Are everything in use, or are som testing files still there?
2. Index.php: The index.php has got "print_r(fetchRoomNameCost($database)[1]["price"])" right at he top. This is probably just for testing, so there is no need to keep it in the finished code.
3. Index.php: There is "include __DIR__ . "/hotelFunctions.php";" and "include __DIR__ . "/form.php";" at the top of index.php. They should probably be exchanged by "Require" when the finished webpage is deployed, since we don't want the code to proceed if something goes wrong with that piece of critical code on a finished webpage.
4. Not a code issue, but there seems to be missing a lot of "alt"-text by images.
5. Features.php: The image path for sauna.jpg is not working on the deployed site. Also, ocurring javascript errors. I'll examine that further down.
6. rooms.php:80, 122, 164 - <div class="radio-wrapper">, (or "Features). Not that much code in the  "Features"-block maybe, but maybe enough to be replaced by a function, or perhaps just be used as code once? If not for other things, it could make the code a bit easier to grasp.
7. calendar.php:51-end - A wall of out-commented code. Is it left behind on purpose? 
8. calendar.php:17 - Shouldn´t there be a "$calendar1->asMonthView();" below line 17?
9. form.php:50,54 - Un-commented PHP-"echo". Probably from testing. They should be removed when code is finished.
10. form.php:32-46 - Your HTML-forms that sends these data chunks have got the property "required", so they are not supposed to be able to send empty data. So, for the forms the error check is probably a bit unnecessary, but perhaps this is supposed to be used by the API instead?. 
11. form.php:74-84 - These if-statements are very similar. The line 84 could probably be moved to just below row 77, and the if-statement it belonged to could be removed altogether.
12. header.css:7-9 - This un-commented text should probably be removed.
13. rooms.css:112-114 (and in rooms.php) - I didn't see this in the HTML-file before. You already have a "h1" above these three, the h1.headingcard. Avoid using multiple h1:s on a webpage.
14. style.css:1-4 - the "main"-tag is found here, as well is in the small main.css-file. Maybe move the "main"-tag from main.css here, and move the "body"-tag from main.css to global.css? The you can remove main.css altogether.
15. style.css:28-38 - Can't these rows go together just under table.calendar? Just to try to keep the code a bit dry?
16. style.css:108-110 - Be removed?
17. script.js:10-13 - This is probably left after testing. Be removed?
18. script.js:15-varies - Some errors in the web reader here. The variables created on rows 1-8 can't be dynamically created on index.php, since the html needed just exists when rooms.php is active. You could add an eventlisterner to the window (or similar) that creates the variables when rooms.php activates, and then destroys them when rooms.php is deactivated (another page activates).
