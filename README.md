# Simple PHP Basket

This project implements a proof of concept for Acme Widget Co's new sales system.

## Features

- Product catalog management
- Special offer implementation
- Dynamic delivery cost calculation
- Basket functionality with add and total methods
- 
## Assumptions

- Products and offers are pre-loaded into the in-memory database.
- The system handles invalid product codes and offers gracefully.
- The "buy one red widget, get the second half price" offer applies to pairs of red widgets in the basket.
- The delivery cost is calculated based on the total weight of the products in the basket.
- The system does not handle multiple offers on the same product.
- The system does not handle multiple products with the same code.
- The system does not handle empty basket.
- The system does not handle negative quantity.

## License

This project is licensed under the MIT License.
