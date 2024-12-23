function updateSession(value, type) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "update_session.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText); // Debugging
            location.reload(); // Reload page to reflect changes
        }
    };
    xhr.send(`value=${value}&type=${type}`);
}
