document.addEventListener('DOMContentLoaded', function() {
    var searchForm = document.querySelector('.menu-form');
    var searchInput = document.querySelector('.menu-input');
    var menuButton = document.querySelector('.menu-button');

    searchForm.addEventListener('submit', function(event) {
        event.preventDefault();
        performSearch();
    });

    menuButton.addEventListener('click', function(event) {
        event.preventDefault();
        performSearch();
    });

    function performSearch() {
        var searchTerm = searchInput.value.trim().toLowerCase();
        if (searchTerm === '') return;

        var foundElements = document.querySelectorAll('.container, .audio-controls');
        var foundPositions = [];
        var foundCount = 0;

        foundElements.forEach(function(element, index) {
            var elementText = element.textContent.toLowerCase();
            if (elementText.includes(searchTerm)) {
                foundPositions.push(element.offsetTop);
                foundCount++;
            }
        });

        if (foundCount > 0) {
            var closestPosition = foundPositions.reduce(function(prev, curr) {
                return (Math.abs(curr - window.scrollY) < Math.abs(prev - window.scrollY) ? curr : prev);
            });

            window.scrollTo({
                top: closestPosition,
                behavior: 'smooth'
            });
        }

        searchInput.value = '';
    }
});