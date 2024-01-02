function toggleProfileMenu() {
    const profileMenu = document.getElementById('profile')
    profileMenu.classList.toggle('hidden')
}

// CAROUSEL
document.addEventListener('DOMContentLoaded', function () {
    const totalItems = 7; // Total number of carousel items
    let currentItem = 1; // Initial item

    const showItem = (index) => {
        // Hide all items
        for (let i = 1; i <= totalItems; i++) {
            document.getElementById(`carousel-item-${i}`).classList.add('hidden');
            document.getElementById(`carousel-indicator-${i}`).setAttribute('aria-current', 'false');
        }

        // Show the selected item
        document.getElementById(`carousel-item-${index}`).classList.remove('hidden');
        document.getElementById(`carousel-indicator-${index}`).setAttribute('aria-current', 'true');
    };

    const showNextItem = () => {
        currentItem = currentItem < totalItems ? currentItem + 1 : 1;
        showItem(currentItem);
    };

    const showPrevItem = () => {
        currentItem = currentItem > 1 ? currentItem - 1 : totalItems;
        showItem(currentItem);
    };

    // Attach click event listeners to carousel controls
    document.getElementById('data-carousel-prev').addEventListener('click', showPrevItem);
    document.getElementById('data-carousel-next').addEventListener('click', showNextItem);

    // Attach click event listeners to carousel indicators
    for (let i = 1; i <= totalItems; i++) {
        document.getElementById(`carousel-indicator-${i}`).addEventListener('click', () => {
            showItem(i);
            currentItem = i;
        });
    }

    showItem(currentItem);

    // Carousel slide change every 5 seconds
    setInterval(showNextItem, 5000);
});


//  CART
var price = (document.getElementById('price').textContent).substring(1);
var strWithPeriod = price.replace(',', '.');
var pricePerItem = parseFloat(strWithPeriod);
var initialQuantity = 1;

// Initialize quantity and total price
document.getElementById('quantity').value = initialQuantity;
updateTotalPrice();

function incrementQuantity() {
    var quantityInput = document.getElementById('quantity');
    var currentQuantity = parseInt(quantityInput.value) || 1;
    quantityInput.value = currentQuantity + 1;

    updateTotalPrice();
    updateDecrementButtonState();
}

function decrementQuantity() {
    var quantityInput = document.getElementById('quantity');
    var currentQuantity = parseInt(quantityInput.value) || 1;

    if (currentQuantity > 1) {
        quantityInput.value = currentQuantity - 1;
    }

    updateTotalPrice();
    updateDecrementButtonState();
}

function updateDecrementButtonState() {
    var quantityInput = document.getElementById('quantity');
    var decrementButton = document.getElementById('decrement-button');
    var currentQuantity = parseInt(quantityInput.value) || 1;

    // Disable the decrement button if the quantity is 1
    decrementButton.disabled = currentQuantity === 1;
}

function updateTotalPrice() {
    var quantityInput = document.getElementById('quantity');
    var totalAmountElement = document.getElementById('total');
    var currentQuantity = parseInt(quantityInput.value) || 1;

    // Calculate total price based on quantity and price per item
    var totalAmount = currentQuantity * pricePerItem;

    // Update the total amount in the UI
    totalAmountElement.textContent = totalAmount.toFixed(2);
}


// CART 2
var price2 = (document.getElementById('price2').textContent).substring(1);
var strWithPeriod2 = price2.replace(',', '.');
var pricePerItem2 = parseFloat(strWithPeriod2);
var initialQuantity2 = 1;

// Initialize quantity and total price
document.getElementById('quantity2').value = initialQuantity2;
updateTotalPrice2();

function incrementQuantity2() {
    var quantityInput = document.getElementById('quantity2');
    var currentQuantity = parseInt(quantityInput.value) || 1;

    quantityInput.value = currentQuantity + 1;

    updateTotalPrice2();
    updateDecrementButtonState2();
}

function decrementQuantity2() {
    var quantityInput = document.getElementById('quantity2');
    var currentQuantity = parseInt(quantityInput.value) || 1;

    if (currentQuantity > 1) {
        quantityInput.value = currentQuantity - 1;
    }

    updateTotalPrice2();
    updateDecrementButtonState2();
}

function updateDecrementButtonState2() {
    var quantityInput = document.getElementById('quantity2');
    var decrementButton = document.getElementById('decrement-button2');
    var currentQuantity = parseInt(quantityInput.value) || 1;

    // Disable the decrement button if the quantity is 1
    decrementButton.disabled = currentQuantity === 1;
}

function updateTotalPrice2() {
    var quantityInput = document.getElementById('quantity2');
    var totalAmountElement = document.getElementById('total2');
    var currentQuantity = parseInt(quantityInput.value) || 1;

    // Calculate total price based on quantity and price per item
    var totalAmount = currentQuantity * pricePerItem2;

    // Update the total amount in the UI
    totalAmountElement.textContent = totalAmount.toFixed(2);
}