# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added
- Changelog
- Function for deleting a user.
- Functions to get user's id based on email or username.
- Function that discards all saved sessions for specific user.

### Changed
- Some session functions now return `bool` indicating success instead of `void`.

### Security
- Made comments describing functions inside files not return to browser on http request.