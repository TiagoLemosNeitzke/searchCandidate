# Contributing
But before submitting your contribution, be sure to take a moment and read the following guidelines.

- [1. Getting started](#1-getting-started)
- [2. Issue Reporting Guidelines](#2-issue-reporting-guidelines)
- [3. Pull Request Guidelines](#3-pull-request-guidelines)
- [4. New Features and Security Vulnerabilities](#4-new-features-and-security-vulnerabilities)
- [5. Development Setup](#5-development-setup)
    - [5.1. Minimum Requirements](#51-minimum-requirements)
    - [5.2. Prepare the Environment](#52-prepare-the-environment)
    - [5.3. Create the Environment](#53-create-the-environment)
    - [5.4. Building Assets](#54-building-assets)
- [6. Open Application in Browser](#6-open-application-in-browser)

## 1. Getting started

Before you begin:
- Did you read this document in its entirety?
- Check if your environment meets the established minimum requirements.
- Check out the [existing issues](https://github.com/TiagoLemosNeitzke/searchCandidate/issues).

<br />

## 2. Issue Reporting Guidelines

- The issue list of this repo is exclusively for bug reports, docs reports and feature requests. Non-conforming issues will be closed immediately.

- Try to search for your issue, it may have already been answered or even fixed in the master branch (main).

- Use only the minimum amount of code necessary to reproduce the unexpected behavior. The more precisely you isolate the issue, the faster we can investigate.

- Check if the issue is reproducible with the latest stable version of the project, and please indicate the specific version you are using.

- Issues without clear reproduction steps will not be triaged. If an edit labeled "needs reproduction" receives no further comments from the edit author for more than 7 days, it will be closed.

- If your issue is resolved but still open, don’t hesitate to close it. In case you found a solution by yourself, it could be helpful to explain how you fixed it.

- Most importantly, we ask for your patience: the team must balance your request with many other responsibilities - fixing other bugs, answering other questions, new features, new documentation, etc.

<br />

## 3. Pull Request Guidelines
- If adding new feature:
    - Provide convincing reason to add this feature. Ideally you should open a suggestion issue first and have it green light before working on it.
    - Include tests for all code you add or modify.
    - Please ensure all [tests](#7-tests) are passing.

- If fixing a bug:
    - If you are resolving a special issue, add `(fix: #xxxx[,#xxx])` (#xxxx is the issue id) in your PR title for a better release log, e.g. `fix: update entities encoding/decoding (fix #3899)`.
    - Provide detailed description of the bug in the PR.

<br />

## 4. New Features and Security Vulnerabilities

If you intend to propose a new feature, submit an issue to this repository.

In case of discovery of a security vulnerability in this project, **DO NOT** disclose publicly as an Issue, send a message to the email address [tiago.neitzke@yahoo.com](mailto://tiago.neitzke@yahoo.com). All security vulnerabilities will be resolved as soon as possible.

<br />

## 5. Development Setup
This project is developed with the Laravel 10+ release. The entire development environment can be created easily using `Laravel Sail`. Thus creating a standard environment, where all developers will have the same versions of certain technologies on their workstations, avoiding possible problems due to version incompatibility.

`Laravel Sail` as defined in its [documentation](https://laravel.com/docs/10.x/sail) has the following definition:

> Laravel Sail is a light-weight command-line interface for interacting with Laravel's default Docker development environment. Sail provides a great starting point for building a Laravel application using PHP, MySQL, and Redis without requiring prior Docker experience.

Consequently, so that we can maintain compatibility between development environments, we will define here the minimum requirements for generating and hosting the project.

<br />

### 5.1. Minimum Requirements
- PHP v8.3;
- Composer v2.7.1;
- Npm v10.4.0;
- MySql v8.0.32;
- Redis v7.2.4.

<br />

### 5.2. Prepare the Environment
First, clone the repository by running the following command:

```bash
$ git clone git@github.com:beerandcodeteam/adoteumdev.git
```

After cloning the repository, enter the project folder and run:

```bash
$ make
```
The `make` command will install all the dependencies of the project, both from `composer` and `npm` and upload your docker containers. 
If this works, you can skip the other steps below and skip to step [6. Open Application in Browser](#6-open-application-in-browser). 


Alternatively, you can perform the other steps below if the make command does not work:
Install your `composer` dependencies by running the following commands:

```bash
$ docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```

### 5.3. Create the Environment
After installing the dependencies, you need to create the environment. To do this, run the following command:

```bash
$ cp .env.example .env
```
<br />

Upload your docker containers by running the following command:

```bash
$ ./vendor/bin/sail up
```

Install your `npm` dependencies by running the following commands:

```bash
$ ./vendor/bin/sail npm install
```

### 5.4. Building Assets
Now that the development environment has been built, we need to compile the assets so that (`styles, scripts, etc`)  are handled and published. To do this, just run the following command:

```bash
$ ./sail npm run dev
```

<br />

## 6. Open Application in Browser
With everything resolved, the time has definitely come to see the application working, for that, go to the url `http://localhost:${APP_PORT}` in your favorite browser.

📝 Note
> Where ${APP_PORT} should be replaced by the port number informed in your '.env' file, if you did not enter a port number, the default port used will be `80`.

<br />

## 7. Tests

The project uses [Pest](https://pestphp.com/) PHP Test Framework.

To run tests, execute the command:

```bash
$ ./sail test
```
