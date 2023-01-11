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
6. rooms.php:80, 122, 164 - <div class="radio-wrapper">, (eller "Features). Inte så mycket kod i "Features"-blockt kanske, men ändå såpass att det kanske kunde ersatts av en funktion, eller helt enkelt bara finnas med en gång? Om inte annat för att göra koden lite mer överskådlig.
7. example.js:10-15 - Remember to think about X and this could be refactored using the amazing Y function.
8. example.js:10-15 - Remember to think about X and this could be refactored using the amazing Y function.
9. example.js:10-15 - Remember to think about X and this could be refactored using the amazing Y function.
10. example.js:10-15 - Remember to think about X and this could be refactored using the amazing Y function.
