# Symfony Workshop

Welcome to the Symfony Workshop repository. This project is designed to help you learn and practice Symfony, a popular PHP framework for web applications.

## Table of Contents

- [Symfony Workshop](#symfony-workshop)
  - [Table of Contents](#table-of-contents)
  - [Introduction](#introduction)
  - [Requirements](#requirements)
  - [Installation](#installation)
  - [Usage](#usage)
  - [Project Structure](#project-structure)
  - [Contributing](#contributing)
  - [License](#license)
  - [Contact](#contact)

## Introduction

This repository contains the materials and code examples for the Symfony Workshop. Whether you are new to Symfony or looking to brush up on your skills, this workshop will guide you through the basics and more advanced topics of Symfony development.

## Requirements

Before you begin, ensure you have the following installed on your local machine:

- PHP 8.0.30
- Composer
- Symfony CLI 5.9.1
- A web server like Apache or Nginx
- A database like MySQL or PostgreSQL

## Installation

Follow these steps to set up the project on your local machine:

1. **Clone the repository:**
   ```sh
   git clone https://github.com/zied-snoussi/Symfony-workshop.git
   cd Symfony-workshop
   ```

2. **Install dependencies:**
   ```sh
   composer install
   ```

3. **Set up environment variables:**
   Copy the `.env.example` file to `.env` and configure your database connection and other environment settings.
   ```sh
   cp .env.example .env
   ```

4. **Generate the application key:**
   ```sh
   php bin/console cache:clear
   ```

5. **Run database migrations:**
   ```sh
   php bin/console doctrine:migrations:migrate
   ```

6. **Run the development server:**
   ```sh
   symfony server:start
   ```

## Usage

Once the server is running, you can access the application in your web browser at `http://localhost:8000`.

## Project Structure

Here is a brief overview of the project structure:

```
Symfony-workshop/
├── assets/             # Frontend assets (CSS, JavaScript, images)
├── bin/                # Symfony binaries
├── config/             # Configuration files
├── public/             # Publicly accessible files (entry point)
├── src/                # Application source code
│   ├── Controller/     # Controllers
│   ├── Entity/         # Doctrine entities
│   ├── Repository/     # Repositories
│   └── ...
├── templates/          # Twig templates
├── tests/              # Automated tests
├── translations/       # Translation files
├── var/                # Symfony-generated files (cache, logs, etc.)
├── vendor/             # Composer dependencies
└── ...
```

## Contributing

Contributions are welcome! If you have any ideas or suggestions to improve this project, please open an issue or submit a pull request.

## License

This project is open source and available under the [MIT License](LICENSE).

## Contact

For any questions or inquiries, please contact Zied Snoussi at [ziedsnoussi.tn@gmail.com].

---

Happy coding!