# ThriftIt Clothes Store

ThriftIt Clothes Store is an online platform for buying and selling second-hand clothes. The store aims to provide a sustainable and affordable fashion option for everyone. The project is developed using a combination of CSS, PHP, SCSS, and JavaScript.

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## Features

- User-friendly interface for browsing and purchasing clothes.
- Secure user authentication and profile management.
- Admin panel for managing products, categories, and orders.
- Responsive design for seamless experience across devices.
- Integration with payment gateways for easy transactions.

## Installation

To set up the project locally, follow these steps:

1. Clone the repository:
    ```bash
    git clone https://github.com/cNassim/ThriftIt-ClothesStore.git
    ```
2. Navigate to the project directory:
    ```bash
    cd ThriftIt-ClothesStore
    ```
3. Install the necessary dependencies:
    ```bash
    composer install
    npm install
    ```
4. Set up the environment variables:
    ```bash
    cp .env.example .env
    ```
    Update the `.env` file with your database and other configuration settings.

5. Run the database migrations and seed the database:
    ```bash
    php artisan migrate --seed
    ```

6. Start the development server:
    ```bash
    php artisan serve
    npm run dev
    ```

## Usage

Once the development server is running, you can access the application at `http://localhost:8000`. 

- Browse the catalog and add items to your cart.
- Create an account or log in to manage your profile.
- Proceed to checkout and complete your purchase.

## Contributing

We welcome contributions from the community! To contribute, follow these steps:

1. Fork the repository.
2. Create a new branch:
    ```bash
    git checkout -b feature/your-feature-name
    ```
3. Make your changes and commit them:
    ```bash
    git commit -m 'Add some feature'
    ```
4. Push to the branch:
    ```bash
    git push origin feature/your-feature-name
    ```
5. Open a pull request and describe your changes.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Author

This project was created by [cNassim](https://github.com/cNassim) as a marked school project.
