## DateDiff

DateDiff is an extension to MediaWiki that provides parser function `#dates` allowing to return
a list of intermediary days.


### Compatibility

* PHP 5.3+
* MediaWiki 1.23+

See also the "CHANGELOG.md" file provided with the code.


### Installation

(1) Obtain the code from [GitHub](https://github.com/wikimedia/mediawiki-extensions-DateDiff/releases)

(2) Extract the files in a directory called `DateDiff` in your `extensions/` folder.

(3) Add the following code at the bottom of your "LocalSettings.php" file:
```
require_once "$IP/extensions/DateDiff/DateDiff.php";
```
(4) Go to "Special:Version" on your wiki to verify that the extension is successfully installed.

(5) Done.
