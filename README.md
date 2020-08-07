<br />
<div align="center">
  <strong>
    <h2 align="center">TMDB API (PHP)</h2>
  </strong>
  
  <p align="center">
      <a href="https://app.circleci.com/pipelines/github/chiiya/tmdb-api-php" target="_blank"><img src="https://circleci.com/gh/chiiya/tmdb-api-php.svg?style=shield"></a>
      <a href="https://codecov.io/gh/chiiya/tmdb-api-php">
        <img src="https://codecov.io/gh/chiiya/tmdb-api-php/branch/master/graph/badge.svg" />
      </a>
      <a href="https://php.net/" target="_blank"><img src="https://img.shields.io/badge/php-%3E%3D%207.2-8892BF.svg"></a>
      <a href="#quality-assurance" target="_blank"><img src="https://img.shields.io/badge/qa--level-high-success"></a>
    </p>

  <p align="center">
    📺 PHP wrapper for the TMDB API. <strong>Early WIP, not for usage.</strong>
  </p>

  <p align="center">
    <strong>
    <a href="#index">index</a>
    &nbsp; &middot; &nbsp;
    <a href="documentation/README.md">documentation</a>
    </strong>
  </p>
</div>
<br />

## Index

<pre>
<a href="#installation"
>> Installation ..................................................................... </a>
<a href="#contributing"
>> Contributing ..................................................................... </a>
<a href="#documentation"
>> Documentation .................................................................... </a>
</pre>

## Installation

```bash
composer require chiiya/tmdb-api-php
```

## Contributing

Contributions are welcome. To set up the project, run `just setup`.

<details>
  <summary><strong>About <code>just</code></strong></summary>

<hr>

[Just](https://github.com/casey/just) is a command runner similar to <code>make</code> with some advantages 
and better cross-platform support. It should be installed both in Homestead and on your local system.
You can list all available commands in a project using <code>just --list</code>.
<br><br>

**Installation Ubuntu / WSL / Homestead**:  

```bash
curl --proto '=https' --tlsv1.2 -sSf https://just.systems/install.sh | sudo bash -s -- --to /usr/local/bin
sudo chown $USER:$USER /usr/local/bin/just
```
**Installation Windows (Git Bash)**:  

```bash
# Download latest release from https://github.com/casey/just/releases
# Extract and copy just.exe to C:\Program Files\Git\mingw64\bin
# You can now use `just` from Git Bash
```
**Installation Mac**:  

```bash
brew install just
```
</details>

#### Linting

To lint (and fix) your PHP code, run the following command:

```bash
just lint
```

Make sure your code passes before pushing, since otherwise the build will fail
and your pull request won't be merged.

#### Pre-Commit

Since linting the files manually before each commit is cumbersome, a
`pre-commit` configuration is available to run PHP CS Fixer before each commit.
If you have used `pre-commit` before, then all you need to do is run
`pre-commit install` once after cloning the project, and you're set. Otherwise,
[install `pre-commit`](https://pre-commit.com/#install).

<details>
  <summary>Workflow</summary>

```bash
git add .
git commit -m "Commit message"
# If fixes are done, stage and commit again:
git add -u && !!
```

</details>

#### Tests

Run the tests with `just test`. This will run all unit tests. A code coverage 
report can be generated with `just coverage`. This will take **significantly** 
longer than just running the tests normally.

#### Quality Assurance

A list of QA criteria has been defined for this project. When contributing, try
to keep these goals in mind.

<details>
  <summary>🟢 QA Criteria</summary>

-   [x] Linting Configuration
-   [ ] Code Quality Configuration (Psalm)
-   [x] Pre-Commit Configuration
-   [ ] CI Configuration: [Build, Lint, Test, Quality]
-   [x] JUSTFILE
-   [x] Documentation
-   [ ] > 95% Test Coverage
</details>

## Documentation

The documentation for this package can be found
[here](documentation/README.md).
