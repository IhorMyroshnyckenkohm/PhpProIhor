<div style="color: red">
    error
</div>

<script>
    const xrm = new XMLHttpRequest();

    xrm.onreadystatechange = function () {
        if (xrm.readyState === XMLHttpRequest.DONE) {
            if (xrm.status === 200) {
                const response = JSON.parse(xrm.responseText);
                console.log(response);
            } else {
                console.error('Помилка запиту:', xrm.status);
            }
        }
    };

    xrm.open('GET', 'index.php', true);
    xrm.send();
</script>