# Adding New Storage Adapter

This document is a part of Utopia PHP contributors' guide. Before you continue reading this document make sure you have read the [Code of Conduct](../CODE_OF_CONDUCT.md) and the [Contributing Guide](../CONTRIBUTING.md).

## Getting Started

Storage adapters help us use various storage services to store our data. As of writing this guide, we already support Local storage, [AWS S3](https://aws.amazon.com/s3/) storage and [Digitalocean Spaces](https://www.digitalocean.com/products/spaces/) storage.

## 1. Prerequisities

It's really easy to contribute to an open source project, but when using GitHub, there are a few steps we need to follow. This section will take you step-by-step through the process of preparing your own local version of `utopia-php/storage`, where you can make any changes without affecting the upstream repository right away.

> If you are experienced with GitHub or have made a pull request before, you can skip to [Implement new Storage Adapter](#2-implement-new-storage-adapter).

###  1.1 Fork the repository

Before making any changes, you will need to fork the `utopia-php/storage` repository to keep branches on the upstream repo clean. To do that, visit the [repository](https://github.com/utopia-php/storage) and click on the fork button.

This will redirect you from `github.com/utopia-php/storage` to `github.com/YOUR_USERNAME/storage`, meaning all further changes will reflect on your copy of the repository. Once you are there, click the highlighted `Code` button, copy the URL and clone the repository to your computer using `git clone` command:

```shell
$ git clone COPIED_URL
```

> To fork a repository, you will need the git-cli binaries installed and a basic understanding of CLI. If you are a beginner, we recommend you to use `Github Desktop`. It is a really clean and simple visual Git client.

Finally, you will need to create a `feat-XXX-YYY-storage-adapter` branch based on the `master` branch and switch to it. The `XXX` should represent the issue ID and `YYY` the Storage adapter name.

## 2. Implement new Storage Adapter

### 2.1 Add new adapter and implement it

In order to start implementing new storage adapter, add new file inside `src/Storage/Device/YYY.php` where `YYY` is the name of the storage provider in `PascalCase`. Inside the file you should create a class that extends the basic `Device` abstract class. Note that the class name should start with a capital letter, as PHP FIG standards suggest.

Always use properly named environment variables if any credentials are required.

### 2.2. Introduce new device constant
Introduce newly added device constant in `src/Storage/Storage.php` alongside existing device constants. The device constant should start with `const DEVICE_<name of device>` as the existing ones.

## 3. Test your adapter

After you finish adding your new adapter, you need to ensure that it is usable. Use your newly created adapter to make some sample requests to your storage service. 

Great! You're almost there. You can now move onto writing some tests for your Adapter!  

### 3.1. Introduce new device tests
Add tests for the newly added device adapter inside `tests/Storage/Device`. Use the existing adapter tests as a reference. The test file and class should be properly named `<Adapter class name>Test.php` and class should be `<Adapter class name>Test`

### 3.2. Run and verify tests
Run tests using `vendor/bin/phpunit --configuration phpunit.xml` and verify that everything is working correctly.

If everything goes well, raise a pull request and be ready to respond to any feedback which can arise during our code review.

## 4. Raise a pull request

First of all, commit the changes with the message `Added YYY Storage adapter` and push it. This will publish a new branch to your forked version of `utopia-php/storage`. If you visit it at `github.com/YOUR_USERNAME/storage`, you will see a new alert saying you are ready to submit a pull request. Follow the steps GitHub provides, and at the end, you will have your pull request submitted.

## 🤕 Stuck ?
If you need any help with the contribution, feel free to head over to [our discord channel](https://appwrite.io/discord) and we'll be happy to help you out.
