Forum Project
Introduction
Welcome to our Forum Project! This interactive web forum allows users to communicate, categorize posts, like and dislike posts and comments, and filter posts efficiently using SQLite.

Features
User Authentication
Registration: Users can register with their email, username, and password.
Login: Registered users can log in to create posts and comments.
Sessions: User sessions are maintained using cookies with expiration dates for security.

Communication
Posts and Comments: Registered users can create posts and comments. Posts can be associated with one or more categories.
Visibility: All posts and comments are visible to both registered and non-registered users.
Likes and Dislikes
Interaction: Registered users can like or dislike posts and comments.
Count Display: The number of likes and dislikes is visible to all users.

Filtering
Categories: Users can filter posts by categories.
Created Posts and Liked Posts: Registered users can filter posts based on their own created or liked posts.

Technical Details
Database
SQLite: Utilized for data storage, including users, posts, comments, likes, and categories.
Queries: Includes SELECT, CREATE, and INSERT queries for database manipulation.

Security
Password Encryption: Passwords are encrypted for secure storage (using bcrypt as a bonus task).
UUID: Use of UUID for unique session identification (bonus task).

Docker
Containerization: The application is containerized using Docker for easy deployment and dependency management.

Technologies Used
Languages and Frameworks: Go (no frontend libraries or frameworks like React, Angular, Vue)
Libraries: SQLite3, bcrypt, UUID

Development Practices
Good Practices: Code adheres to best practices for maintainability and readability.
Unit Testing: Includes test files for unit testing to ensure code reliability.
Getting Started
Prerequisites
Docker: Ensure Docker is installed on your machine.

Installation
Clone the Repository: git clone <repository-url>
Build the Docker Image: docker build -t forum-app .
Run the Docker Container: docker run -p 8080:8080 forum-app

Usage
Register: Create a new account.
Login: Log in with your credentials.
Create Posts and Comments: Engage with the community by creating posts and comments.
Interact: Like or dislike posts and comments.
Filter Posts: Use the filter options to navigate through posts based on categories, your created posts, or liked posts.

Contact / Issue
If you encounter any problems or have requests, please create an issue on GitHub or contact us directly.
