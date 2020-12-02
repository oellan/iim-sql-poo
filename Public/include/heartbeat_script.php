<?php
if (!array_key_exists('id', $_SESSION)) {
    return;
}
?>
<script>
    function heartbeat() {
        const formData = new FormData();
        const date = new Date();
        formData.set('timestamp', `${date.getFullYear()}-${date.getMonth()}-${date.getDay()} ${date.getHours()}:${date.getMinutes()}:${date.getSeconds()}`);
        fetch('?page=heartbeat', {
            method: 'POST',
            body: formData
        }).then(() => {
            setTimeout(heartbeat, 5000);
        })
    }

    heartbeat()
</script>