# Changelog

All notable changes to this project will be documented in this file,
in reverse chronological order by release.

## 1.8.1 (2019-04-29)

### Added

- Added `.editorconfig` file
- Added `phpunit.xml.dist` file
- Added `CHANGELOG.md` file
- Added `phpunit/phpunit` library (5.7)
- Added `squizlabs/php_codesniffer` library (3.4)
- Added `scripts` section to `composer.json` file
- Added `studlyCase` method to `StringUtil` class
- Added `camelCase` method to `StringUtil` class
- Added/Updated unit tests for `StringUtil` class
- Added logo, badges and description to `README.md` file

### Changed

- Changed `trim` method in `StringUtil` class (added default charlist params)
- Changed `ltrim` method in `StringUtil` class (added default charlist params)
- Changed `rtrim` method in `StringUtil` class (added default charlist params)
- Changed `indexOfIgnoreCase` method in `StringUtil` class (refactored method)
- Changed `cutWords` method in `StringUtil` class (trimmed whitespaces after last word)
- Changed all classes to `PSR-2` coding standard

### Deprecated

**Nothing**

### Removed

**Nothing**

### Fixed

- Fixed encoding bug in `indexOf` method in `StringUtil` class
- Fixed missing/wrong params in `replaceReg` method in `StringUtil` class
- Fixed failed unit tests in `ClassUtil` class
