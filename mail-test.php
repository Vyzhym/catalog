<?php
if (mail("test@example.com", "заголовок", "текст")) {
    echo 'Отправлено';
}
else {
    echo 'Не отправлено';
}
?>