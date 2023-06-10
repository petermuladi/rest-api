## ⚙Rest API with Laravel

#### This is a Tasks CRUD (Create, Read, Update, Delete) REST API Laravel project that provides a comprehensive authorization token management system. It allows users to perform authenticated operations on various resources while ensuring proper authorization and access control.(Only backend)

## Technologies

**Project is created with**

- Laravel Framework 10.12.0
- MySQL: v8.0.27


## Key Features

The Project offers the following key features:

- **User Authentication**: Users can register and log in to the application using their credentials. The system securely stores passwords by encrypting them before persisting in the database. Registered users receive unique access tokens upon successful login.

- **Authorization Token Management:** The API utilizes authorization tokens to grant access to protected resources. Tokens are issued upon successful authentication and must be included in subsequent requests for authorization.

- **Resource CRUD Operations:** The API supports Create, Read, Update, and Delete operations on various resources, allowing users to interact with the system's data. Each request requires proper authentication and authorization to perform the corresponding action

- **Access Control:** The API implements robust access control mechanisms to ensure that only authorized users can perform specific operations on resources. It leverages roles and permissions to define granular access policies for different user types.

- **Error Handling:** The API includes comprehensive error handling mechanisms to provide meaningful responses and proper HTTP status codes in case of errors or invalid requests. Error responses are returned in a consistent JSON format.

- **Validation and Data Integrity:** Incoming data is validated to ensure its integrity and adherence to predefined rules. The API validates user input, preventing malformed or invalid data from affecting the system's stability or security.

## API Endpoints 
Below are the API endpoints available in the REST API Laravel project. These endpoints have been tested using **Postman**.

- Check endpoints 
```bash
php artisan route:list
```


## Installation

To install and run the application, follow these steps:

**1. Clone the repository**

```bash
git clone https://github.com/petermuladi/rest-api.git
```

**2. Go to project folder**

- rest-api/my-app

**3. Install dependencies**

```bash
composer install
```

**4. Create a new .env file**

```bash
cp .env.example .env
```

**5. Update the .env file with your database credentials**

```bash
DB_DATABASE=[your-database-name]
DB_USERNAME=[your-database-username]
DB_PASSWORD=[your-database-password]
```

**6. Generate an application key**

```bash
php artisan key:generate
```

**7. Run database migrations**

```bash
php artisan migrate
```

**8. Start the web server**

```bash
php artisan serve
```

**8. Navigate to the project URL**

```bash
localhost:8000
```

## Additional Notes
**The application was created by Muladi Péter.**