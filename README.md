# Sales Management System

Welcome to the "SalesManagementSystem" project! This repository is dedicated to building a robust system for managing sales data effectively. Below are the key components and features included in this project:

**Sale Model with Soft Delete Trait:**

Define a Sale model in the database schema with a soft delete trait, allowing for logical deletion of sales records without permanently removing them from the database.

**InvoiceCreated Event Broadcasting:**

When a new sale is created, broadcast an InvoiceCreated event and push it to a queue for further processing. This event facilitates real-time updates and notifications within the system.

**InvoiceCreated Event Logging:**

Subscribe to the InvoiceCreated event and write a log entry into the invoice.log file for every occurrence. The log entry includes the date, reference number, and total amount of the invoice, providing a comprehensive audit trail for sales transactions.

**GraphQL Endpoint Development:**

Develop a GraphQL endpoint that allows users to query the system for daily total sales within a specified date range. Users can also filter the results based on payment status and payee ID, providing flexibility in data retrieval and analysis.

**Sample Dataset:**

Included in the repository is a sample dataset in SQL format, providing a foundation for testing and experimentation with the system's functionalities.

**How to Use:**

1. Clone or download the repository to your local machine.

2. Set up a local development environment with a compatible web server (e.g., Apache, Nginx) and a database server (e.g., MySQL, PostgreSQL).

3. Import the sample dataset into your database management system to populate the database with initial data.

4. Implement the Sale model with the soft delete trait in your database schema.

5. Configure event broadcasting and logging mechanisms as described in the project specifications.

6. Develop and deploy the GraphQL endpoint to enable querying of daily total sales data.

7. Test the system's functionalities by querying sales data using the GraphQL endpoint and verifying event logging and broadcasting operations.

**Notes:**

- This project is intended for educational and demonstration purposes and may require further customization and integration to suit specific business requirements.

- Ensure proper security measures are implemented, especially when handling sensitive sales data and processing user queries.

Thank you for exploring the "SalesManagementSystem" project. If you have any questions or feedback, please don't hesitate to reach out.
