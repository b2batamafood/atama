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
