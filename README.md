## Project Set Up
```bash
composer install

update .env file with your local environment and database credentials

npm install

php artisan optimize

Then, you need to run migration command.

php artisan migrate

Then, run the development server:

php artisan serve
```
## 1. Form Handling Questions

1. Simple Form URL => [http://localhost:8000/simple-form](http://localhost:8000)
   can check data in browser console

2. Contact Form URL => [http://localhost:8000/contact-form](http://localhost:8000)
   can see validation and success alert in contact form page

3. Complete Form URL => [http://localhost:8000/complete-form](http://localhost:8000)
   can see contact display page after inserting data in the form

## 2. Data Manipulation Questions

Item List including delete/recover/search features => [http://localhost:8000/items](http://localhost:8000)

## 3. API Development Questions
Can test in postman <br /><br />
GET ITEM API => [http://localhost:8000/api/items](http://localhost:8000)(METHOD => GET) <br />
POST ITEM API => [http://localhost:8000/api/items](http://localhost:8000)(METHOD => POST) <br />
UPDATE ITEM API => [http://localhost:8000/api/items/{id}](http://localhost:8000)(METHOD => PUT) <br />
DELETE ITEM API => [http://localhost:8000/api/items/{id}](http://localhost:8000)(METHOD => DELETE)

# Theoretical Essay Questions

## 1. MVC Understanding
### 1. Describe the role of Model, View, and Controller in the MVC architecture.
Model: <br />
Represents the application's data and business logic.
Handles data retrieval, manipulation, and storage (e.g., interacting with the database).
Sends data to the controller or view when requested.

View: <br />
Represents the user interface (UI) and presentation layer.
Displays data to the user (received from the model via the controller).
Handles user interactions and forwards them to the controller.

Controller: <br />
Acts as an intermediary between the Model and View.
Handles user input, processes requests, and determines the appropriate responses.
Updates the model and selects the appropriate view to display.

### 2. How can complex business logic be separated from the Controller in an MVC framework? Provide examples.
Complex business logic can be separated from the Controller in an MVC framework by using Service Classes, 
Repositories, or Helper Classes. This ensures the controller remains focused on handling user input and 
directing the flow between the Model and View. <br />

I will describe with Repositories pattern: <br />
Abstract database queries to keep them out of controllers. <br />
Example: <br />

```php
// UserRepository.php
class UserRepository {
    public function findActiveUsers() {
        return User::where('status', 'active')->get();
    }
}

// Controller
$userRepo = new UserRepository();
$users = $userRepo->findActiveUsers();
```

## 2. Object-Oriented Programming
### 3. List and explain the four fundamental principles of Object-Oriented Programming (OOP).

Encapsulation: <br />
Bundles data (fields) and methods (functions) that operate on the data into a single unit, called a class.
Restricts direct access to some components using access modifiers (public, private, protected) to ensure controlled data manipulation.

Inheritance: <br />
Allows one class (child/subclass) to inherit properties and methods from another class (parent/superclass).
Promotes code reuse and hierarchical relationships.

Polymorphism: <br />
Allows a single method or object to take on multiple forms, typically achieved through method overriding or interfaces.
Enables flexibility and dynamic behavior.

Abstraction: <br />
Focuses on exposing only essential details while hiding implementation complexity.
Achieved using abstract classes or interfaces.

### 4. Provide an example of using Polymorphism in an implementation and explain its advantages. 
Polymorphism allows methods to be implemented differently in different classes, enabling flexibility. <br />
Let me describe with code example: <br />

```php
interface Animal {
    public function makeSound();
}

class Dog implements Animal {
    public function makeSound() {
        return "Bark";
    }
}

class Cat implements Animal {
    public function makeSound() {
        return "Meow";
    }
}

// Using polymorphism
function playAnimalSound(Animal $animal) {
    echo $animal->makeSound();
}

$dog = new Dog();
$cat = new Cat();

playAnimalSound($dog); // Outputs: Bark
playAnimalSound($cat); // Outputs: Meow

```

Advantages of Polymorphism: <br />

1. Flexibility: You can write code that works with different types of objects in a uniform way.
2. Extensibility: Adding new types (e.g., Fish or Elephant) doesn’t require modifying existing code.
3. Code Reusability: Common logic can work for any class that implements the interface or inherits a parent class.
4. Scalability: Makes systems easier to expand and maintain.

## 3. Modern Web Development
### 5. Explain the differences between SPA (Single Page Application) and SSR (Server-Side Rendering), along with their advantages.
Differences between SPA and SSR: <br />

Rendering: <br />
SPA => Renders content in the browser using JavaScript. <br />
SSR => Renders content on the server and sends it to the browser as HTML.

Initial Load Speed: <br />
SPA => Slower due to downloading and compiling JS files. <br />
SSR => Faster as pre-rendered HTML is sent to the client.

SEO Friendliness: <br />
SPA => Challenging, but can be improved with pre-rendering or hydration. <br />
SSR => SEO-friendly, as full content is available to search engines.

Advantages of SPA: <br />
Better User Experience: Dynamic and seamless interactions without page reloads. <br />
Reduced Bandwidth: Only data (not full pages) is transferred after the initial load.

Advantages of SSR: <br />
Improved SEO: Pre-rendered content is better for search engine indexing. <br />
Faster Initial Load: HTML is sent directly from the server, making the app visible sooner.

### 6. Describe the basic structure of a CI/CD pipeline and explain its benefits.
Basic Structure of a CI/CD Pipeline: <br />

Source Stage: <br />
Triggered by changes in the code repository (e.g., a git push or pull request). <br />
Detects updates and initiates the pipeline.

Build Stage: <br />
Compiles the application and resolves dependencies. <br />
Creates build artifacts (e.g., binaries, container images).

Test Stage: <br />
Runs automated tests to ensure code quality and reliability. <br />
Fails the pipeline if tests fail.

Release Stage: <br />
Packages the application and prepares it for deployment.

Deploy Stage: <br />
Deploys the application to staging, production, or other environments.

Monitoring Stage: <br />
Monitors the deployed application for performance, errors, and uptime.


### 7. Compare RESTful APIs and GraphQL. Provide examples of when to use each.
Comparison of RESTful APIs and GraphQL: <br />

Data Fetching: <br />
REST => Fixed endpoints return predefined data. <br />
GraphQL => Single endpoint, clients specify exactly what data is needed.

Performance: <br />
REST => May require multiple requests for related data. <br />
GraphQL => Fetches all required data in a single request.

Flexibility: <br />
REST => Limited flexibility due to predefined responses. <br />
GraphQL => Highly flexible, allowing tailored responses.

Caching: <br />
REST => Relies on HTTP caching (e.g., ETag, Cache-Control). <br />
GraphQL => Requires custom caching mechanisms (e.g., persisted queries).


When to Use RESTful APIs: <br />

Simplicity: <br />
REST is ideal for simple APIs where fixed endpoints are sufficient. <br />
Example: <br />
Public APIs like weather or currency exchange services.

Caching: <br />
When caching at the HTTP level is critical. <br />
Example: <br />
Content delivery APIs for static resources.

When to Use GraphQL: <br />

Custom Data Requirements: <br />
When clients need to request specific fields, reducing bandwidth usage. <br />
Example: <br />
Mobile apps that require optimized data fetching to save network resources.

Dynamic Relationships: <br />
For applications with complex relationships between entities. <br />
Example: <br />
Social media platforms where users, posts, and comments are interrelated.

Single Endpoint: <br />
When managing multiple REST endpoints becomes cumbersome. <br />
Example: <br />
E-commerce applications needing data for products, orders, and customers in one query.

## 4. Database and Persistence
### 8. What is database normalization? Explain the differences between 1NF, 2NF, and 3NF.
Database normalization is the process of organizing data in a database to minimize redundancy and improve data integrity. <br />
Differences Between 1NF, 2NF, and 3NF: <br />

1NF (First Normal Form):
Ensures that all columns contain atomic (indivisible) values, and each column stores a single type of data.
- Remove duplicate rows.
- Ensure each column has atomic values (e.g., no arrays or lists).

2NF (Second Normal Form):
Achieves 1NF and ensures that every non-key attribute is fully functionally dependent on the entire primary key.
- Eliminate partial dependencies (where non-key attributes depend only on part of a composite primary key).

3NF (Third Normal Form):
Achieves 2NF and ensures no transitive dependency exists (non-key attributes should depend only on the primary key).
- Eliminate transitive dependencies (e.g., if A → B and B → C, remove the dependency of C on A).

### 9. Compare NoSQL and relational databases. Discuss suitable use cases for each.
Comparison of NoSQL and Relational Databases <br />
Data Model: <br />
Relational Databases => Follows a structured schema (tables, rows, columns). <br />
NoSQL Databases => Flexible schema with various models (key-value, document, graph, etc.).

Query Language: <br />
Relational Databases => Uses SQL (Structured Query Language). <br />
NoSQL Databases => Uses different query methods based on the database type (e.g., JSON-like queries).

Scalability: <br />
Relational Databases => Vertically scalable (adding more resources to a single server). <br />
NoSQL Databases => Horizontally scalable (adding more servers/nodes).

Flexibility: <br />
Relational Databases => Schema is rigid; changes require migrations. <br />
NoSQL Databases => Schema-less or flexible schema, allowing dynamic changes to data structures.

Transactions: <br />
Relational Databases => Strong ACID compliance for reliable transactions. <br />
NoSQL Databases => Provides BASE properties; some NoSQL databases offer limited ACID compliance.

Performance: <br />
Relational Databases => Optimized for complex queries and joins. <br />
NoSQL Databases => Optimized for high-speed reads/writes at scale.

Data Relationships: <br />
Relational Databases => Suitable for structured data with complex relationships (e.g., foreign keys, joins). <br />
NoSQL Databases => Better for unstructured or semi-structured data with fewer relationships.

Use of Indexes: <br />
Relational Databases => Supports multiple types of indexes for faster queries. <br />
NoSQL Databases => Indexing varies and depends on the NoSQL database type.

Storage Type: <br />
Relational Databases => Stores data in rows and columns. <br />
NoSQL Databases => Stores data in JSON, BSON, key-value pairs, graphs, or wide columns.

Use Cases for Relational Databases: <br />
Financial Systems: <br />
Relational databases (e.g., MySQL, PostgreSQL) are ideal for systems requiring strong ACID compliance to maintain data integrity, such as banking or payment systems.

Enterprise Applications: <br />
Applications with complex relationships and structured data, such as HR, ERP, or CRM systems.

E-commerce Platforms: <br />
When managing structured data like products, orders, and customers with complex queries.

Small to Medium-Scale Applications: <br />
Projects that don't need extreme scalability or flexible schema adjustments.

Use Cases for NoSQL Databases: <br />
Big Data and Analytics: <br />
NoSQL databases like MongoDB or Cassandra handle large volumes of unstructured or semi-structured data effectively, such as logs or IoT data.

Real-Time Applications: <br />
NoSQL databases (e.g., Redis) are optimized for high-speed read/write operations in real-time apps like gaming, chat, or session stores.

Scalable Web Applications: <br />
Applications with unpredictable or rapidly growing traffic, such as social media platforms, often use NoSQL for horizontal scalability.

## 5. Performance and Security
### 10. List five methods to improve the performance of a web application and provide examples for each.

1. Caching
Description: Store frequently accessed data in memory or other fast storage to reduce database or server load.
Example:
Use Redis or Memcached to cache user session data or API responses.
Cache static assets (CSS, JS) using CDN (Content Delivery Networks) like Cloudflare.

2. Optimize Database Queries
Description: Reduce expensive database operations through query optimization and indexing.
Example:
Use proper indexing on frequently queried columns to improve query performance.
Replace N+1 queries with eager loading in ORM frameworks like Laravel (with() function).

3. Minimize and Compress Assets
Description: Reduce the size of static files (CSS, JavaScript, images) to improve page load times.
Example:
Use tools like Webpack or Gulp to minify JavaScript and CSS files.
Compress images using tools like TinyPNG or ImageMagick.

4. Implement Asynchronous Processing
Description: Offload resource-intensive tasks to background processes to keep the application responsive.
Example:
Use queues like Laravel Queues or RabbitMQ for email sending or file processing tasks.
Load non-critical JavaScript asynchronously with the async or defer attribute.

5. Use a Content Delivery Network (CDN)
Description: Distribute static assets (images, scripts, videos) across multiple servers worldwide to reduce latency.
Example:
Serve images, videos, and static files via a CDN like AWS CloudFront or Akamai to improve load times for users in different regions.