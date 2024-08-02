//

document.getElementById("search-form").addEventListener("submit", function (e) {
  e.preventDefault();

  const formData = new FormData(this);

  fetch("/search", {
    method: "GET",
    headers: {
      Accept: "application/json",
    },
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      let resultsDiv = document.getElementById("search-results");
      resultsDiv.innerHTML = "";

      if (data.length > 0) {
        data.forEach((user) => {
          let userDiv = document.createElement("div");
          userDiv.innerHTML = `
                    <h3>${user.name}</h3>
                    <p>Localização: ${user.location}</p>
                    <p>Avaliação: ${user.rating}</p>
                `;
          resultsDiv.appendChild(userDiv);
        });
      } else {
        resultsDiv.innerHTML = "<p>Nenhum cuidador encontrado.</p>";
      }
    });
});
