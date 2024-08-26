// Define product data
const PRODUCTS = {
    'B01': { name: 'Blue Widget', type: 'blue' },
    'R01': { name: 'Red Widget', type: 'red' },
    'G01': { name: 'Green Widget', type: 'green' }
};

// Function to handle AJAX requests
function sendAjaxRequest(type, product = null) {
    const formData = new FormData();
    formData.append("type", type);
    if (product) formData.append("product", product);

    return $.ajax({
        url: 'ajax.php',
        type: 'POST',
        data: formData,
        cache: false,
        dataType: 'json',
        processData: false,
        contentType: false
    }).fail((jqXHR, textStatus) => {
        console.error('AJAX Error:', textStatus);
        alert('An error occurred. Please try again.');
    });
}

// Function to add product to basket
function addProduct(productCode) {
    const product = PRODUCTS[productCode];
    if (!product) return;

    $(".add-list").append(`
        <li data-product="${productCode}" data-type="${product.type}">
            ${product.name} (${productCode})
            <a class="remove"><i class="fa fa-minus"></i></a>
        </li>
    `);

    sendAjaxRequest("addProduct", productCode).done(data => {
        if (data.error) {
            console.error('Server Error:', data.error);
            alert('An error occurred. Please try again.');
        }
    });
}

// Event delegation for add product buttons
$(document).on('click', '[id^="add"]', function() {
    const productCode = $(this).attr('id').replace('add', '');
    addProduct(productCode.toUpperCase());
});

// Event delegation for remove product
$(document).on('click', '.remove', function() {
    const $item = $(this).closest('li');
    const productCode = $item.data('product');

    sendAjaxRequest("removeProduct", productCode).done(data => {
        if (data.error) {
            console.error('Server Error:', data.error);
            alert('An error occurred. Please try again.');
        } else {
            $item.remove();
        }
    });
});

// Calculate total cost
$(document).on('click', '#calculate', function() {
    sendAjaxRequest("getTotalCost").done(data => {
        if (data.error) {
            console.error('Server Error:', data.error);
            alert('An error occurred. Please try again.');
        } else {
            $("#totalCost").text(data.total_cost);
        }
    });
});