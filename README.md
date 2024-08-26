# Shopping Basket Application

This is a simple shopping basket application built with PHP and JavaScript. It allows users to add and remove products from a basket and calculate the total cost, including any applicable discounts and delivery fees.

## Features

- Add products to the basket
- Remove products from the basket
- Calculate total cost with discounts and delivery fees
- AJAX-powered for a smooth user experience

## File Structure

- `index.php`: The main page of the application
- `basket.php`: Contains the Basket class for managing the shopping basket
- `ajax.php`: Handles AJAX requests for basket operations
- `js/main.js`: Contains the JavaScript code for client-side interactions
- `includes/header.php`: Header file for the HTML structure
- `includes/footer.php`: Footer file for the HTML structure

## Setup

1. Ensure you have PHP 7.4+ installed on your server.
2. Place all files in your web server's document root.
3. Ensure the web server has write permissions for the session directory.

## Usage

1. Open `index.php` in a web browser.
2. Click on "Add to basket" buttons to add products.
3. Click on the minus icon next to a product in the basket to remove it.
4. Click "Calculate" to see the total cost.

## Product Pricing

- Red Widget (R01): $32.95
- Blue Widget (B01): $7.95
- Green Widget (G01): $24.95

## Special Offers

- Buy one red widget, get the second half price.

## Delivery Charges

- Orders under $50: $4.95
- Orders under $90: $2.95
- Orders of $90 or more: Free

## Technical Details

- The application uses PHP sessions to maintain the basket state between requests.
- AJAX is used to communicate with the server without page reloads.
- The Basket class handles all basket operations and calculations.
- jQuery is used for DOM manipulation and AJAX requests.

## Security Considerations

- All user inputs are sanitized before processing.
- Output is properly escaped to prevent XSS attacks.
- CSRF protection should be implemented for production use.

## Future Improvements

- Add unit tests for the Basket class
- Implement a proper MVC structure
- Add a database for persistent storage
- Implement user authentication and individual user baskets

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is open source and available under the [MIT License](LICENSE).
