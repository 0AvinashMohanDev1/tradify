# Tradify Project Readme

This is a Laravel project designed for note-taking and sharing. Below are the steps to set up the project locally and use its features.

## Getting Started

To get started with the project, follow these steps:

1. Clone the repository to your local machine:

    ```bash
    git clone https://github.com/0AvinashMohanDev1/tradify
    ```

2. Install Composer dependencies:

    ```bash
    composer install
    ```

3. Copy the `.env.example` file to `.env` and configure your environment variables, including database connection details:

    ```bash
    cp .env.example .env
    ```

4. Generate application key:

    ```bash
    php artisan key:generate
    ```

5. Run migrations to create necessary database tables:

    ```bash
    php artisan migrate
    ```

6. Serve the application:

    ```bash
    php artisan serve
    ```

7. Visit `http://localhost:8000/` in your web browser.

## Usage

### Step 1: Register/Login

- Visit [http://localhost:8000/register] to register or [http://localhost:8000/login] to log in.

### Step 2: View Notes

- Once logged in, navigate to [http://localhost:8000/notes] to view all available notes.

### Step 3: View Specific Note

- Click on the ID of a note at [http://localhost:8000/notes/{note_id}] to view its details.

### Step 4: Edit Note

- If the note is shared, you can edit it by clicking on the edit button at [http://localhost:8000/notes/{note_id}/edit].
- If you're not allowed to edit, only the note creator can do so.

### Step 5: Delete Note

- Only the note creator can delete a note by clicking on the delete button.

## Notes

- Make sure you have PHP and Composer installed on your machine.
- This project uses Laravel framework, ensure you are familiar with Laravel basics.
- For further assistance, refer to the Laravel documentation: [https://laravel.com/docs].

Feel free to reach out to [avinashmohandev@gmail.com] for any queries or assistance.
