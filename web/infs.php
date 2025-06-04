<?php
require_once 'config/database.php';

// آرایه اطلاعات دانشجویان (نام، ایمیل، پسورد)
$students = [
    ["Matineh Mousavi", "matineh.mousavi8200@gmail.com", "684723"],
    ["Mobina mahdavi", "mobina.mahdavi.web@gmail.com", "45459898w"],
    ["Parmida Mehrnikoo", "Mehrnikoo.net@gmail.com", "051051"],
    ["Sara Sarfi", "sarasarfi79@gmail.com", "240530"],
    ["Fatemeh Binesh", "fatemehbinesh17@gmail.com", "567834"],
    ["Danial Isaabadi", "danial.isaabadi81@gmail.com", "5038@3910"],
    ["Aida Sadeghi", "asv94974@gmail.com", "2412@8"],
    ["Amirhosein Tasharrofi", "amirhosein.tasharrofi@gmail.com", "626864"],
    ["Masoud Taghipour", "mtaghipourj@gmail.com", "682749"],
    ["Ali Daneshmand", "daneshmanda8@gmail.com", "123ali"],
    ["Omid Haghgoo", "O.Haghgoo@gmail.com", "18182525"],
    ["Mostafa Montazery", "Mostafamtz@gmail.com", "123654"],
    ["Shakila Shaker", "shakilashaker80@gmail.com", "9708404"],
    ["fatemeh khajeh", "fatemeh.khajeh1404@gmail.com", "54578388F"],
    ["Mobina Amini", "mobina.amini.web@gmail.com", "40405050w"],
    ["Shahed Shirazi", "shirazishaheds926@gmail.com", "456ph327"],
    ["amirhosseinasadi", "amirhosseinasadi162@gmail.com", "123654"],
    ["Ghazal Rezaei", "rezaeighazal432@gmail.com", "546897"],
    ["Mobina Fallah", "flhmobinaa@gmail.com", "246810"],
    ["Mahdieh panjei", "mahdiehpanjei@gmail.com", "123456"],
    ["taha sadeghi", "taha18319113@gmail.com", "18319113"],
    ["Sadjad Rezagholizadeh", "sajjad.rz@gmail.com", "Mirame.@loco33"],
    ["ali babakordi", "alibabakordi82@gmail.com", "08342056"],
    ["AbbasEsmaili", "abbas@gmail.com", "123456"]
];

foreach ($students as $student) {
    $name = $student[0];
    $email = $student[1];
    $password = password_hash($student[2], PASSWORD_DEFAULT); // رمز عبور هش شده

    $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    try {
        $stmt->execute([$name, $email, $password]);
        echo "✅ کاربر $name اضافه شد<br>";
    } catch (PDOException $e) {
        echo "❌ خطا برای $name: " . $e->getMessage() . "<br>";
    }
}
