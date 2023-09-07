
document.getElementById("dataForm").addEventListener("submit", function (event) {
    event.preventDefault();
    const formData = new FormData(this);

    // Send data to the server using AJAX or Fetch API
    fetch("/connect.php", {
        method: "POST",
        body: formData,
    })
        .then(response => response.json())
        .then(data => {
            // Handle the server response (e.g., show success message)
            console.log(data.message); // You can customize how you display the message
        })
        .catch(error => {
            // Handle errors
            console.error(error);
        });
});
