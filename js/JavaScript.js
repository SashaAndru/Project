const sports = document.querySelectorAll('.sport');
sports.forEach(sport => {
  sport.addEventListener('click', () => {
    sport.style.backgroundColor = '#ccc';
  });
});

//пошук
const searchInput = document.getElementById('searchInput');
    const sportsList = document.getElementById('sportsList');

    searchInput.addEventListener('input', () => {
      const searchTerm = searchInput.value.toLowerCase();
      const sports = Array.from(sportsList.children);

      sports.forEach(sport => {
        const sportText = sport.textContent.toLowerCase();
        sport.style.display = sportText.includes(searchTerm) ? 'block' : 'none';
      });
    });