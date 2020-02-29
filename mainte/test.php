<?php
// パスワードを記録したファイルの場所
echo __FILE__;
// /opt/lampp/htdocs/PHP_TEST/mainte/test.php

echo '<br>';
// パスワード（暗号化）
echo (password_hash('password123', PASSWORD_BCRYPT));
// $2y$10$CsZggJ8lOr83kynRkXniX.xE4fNoAWDyeZaS3SvpKxY/WfiYpFFbS