<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user card</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="w-full h-full flex justify-center items-center">
        <div class="w-96 bg-zinc-800 p-3 rounded-sm">
            <div class="py-3">
                <h1 class="text-white">New User</h1>
            </div>
            <div class="flex flex-column gap-6">
                <form action="#" method="post" class="w-full">
                    <div class="my-2">
                        <p class="text-white my-2">FirstName</p>
                        <input type="text" class="focus:outline-none outline-2 outline-white/80 rounded-sm w-[100%] p-2" name="fname">
                    </div>
                    <div class="my-2">
                        <p class="text-white my-2">LastName</p>
                        <input type="text" class="focus:outline-none outline-2 outline-white/80 rounded-sm w-[100%] p-2" name="lname">
                    </div>
                    <div class="my-2">
                        <p class="text-white my-2">Your Age</p>
                        <input type="text" class="focus:outline-none outline-2  outline-white/80 rounded-sm w-[100%] p-2" name="age">
                    </div>
                    <div class="my-2">
                        <p class="text-white">Birthday</p>
                    </div>
                    <input type="date" class="border-none focus:outline-none p-3 rounded-sm w-full" name="birthday">
                    <div class="my-2">
                        <p class="text-white">Gender</p>
                    </div>
                    <div class="flex items-center gap-6">
                        <div class="flex gap-2">
                            <input type="radio" name="gender" id="f" value="Female" required>
                            <label for="f" class="text-white">Female</label>
                        </div>
                        <div class="flex gap-2">
                            <input type="radio" name="gender" id="m" required value="Male">
                            <label for="m" class="text-white">Male</label>
                        </div>
                    </div>
                    <div class="my-2">
                        <button name="sbt-btn" class="p-3 border-none active:ring-white bg-slate-600 active:ring-2 ring-offset-2 duration-700 rounded-sm text-white" type="submit">Sebmit</button>
                    </div>
                    <?php
                    $rand_id = rand();
                    if (isset($_POST["sbt-btn"])) {
                        $user = [
                            htmlspecialchars($_POST["fname"]),
                            htmlspecialchars($_POST["lname"]),
                            htmlspecialchars((int)$_POST["age"]),
                            $_POST["birthday"],
                            $_POST["gender"],
                        ];
                        if (empty(trim($user[0])) or empty(trim($user[1])) or empty(trim($user[2]))) {
                            print "<p class='text-red-500 font-bold'>Please field this form</p>";
                        } else if (is_nan($user[2]) or $user[2] < 1 or empty($user[2])) {
                            print "<p class='text-red-500 font-bold'>Invalid age</p>";
                        } else if (empty($user[3])) {
                            print "<p class='text-red-500 font-bold'>Invalid date</p>";
                        } else if (empty($user[4])) {
                            print "<p class='text-red-500 font-bold'>Invalid gender</p>";
                        } else {
                            $user_profile = fopen("$user[0]$user[1]$rand_id.html", "a+") or die("Ooops filed to create your profile");
                            fwrite($user_profile, "
                            <html lang='en'>
                            <head>
                                <meta charset='UTF-8'>
                                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                                <title>$user[0]</title>
                                <script src='https://cdn.tailwindcss.com'></script>
                            </head>
                            <body>
                             <div class='w-full h-full flex justify-center items-center'>
                                <div class='w-72 p-3 bg-zinc-800 rounded-xl'>
                                    <div class='flex justify-center items-center flex-wrap'>
                                        <div class='w-24 h-24 outline overflow-hidden outline-2 outline-white rounded-full'>
                                        <img src='assets/avatar.png' class='w-full h-full'/>
                                        </div>
                                        <div class='py-2 w-full text-center'>
                                            <h1 class='text-white text-2xl font-bold'>$user[0]</h1>
                                        </div>
                                    </div>
                                    <div class='p-3'>
                                        <div class='my-2'>
                                            <p class='text-white'>FirstName : $user[0]</p>
                                        </div>
                                        <div class='my-2'>
                                            <p class='text-white'>LastName : $user[1]</p>
                                        </div>
                                        <div class='my-2'>
                                            <p class='text-white'>Age : $user[2]</p>
                                        </div>
                                        <div class='my-2'>
                                            <p class='text-white'>Birthday : $user[3]</p>
                                        </div>
                                        <div class='my-2'>
                                            <p class='text-white'>Gender : $user[4]</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </body>
                        </html>
                            ");
                            print "<p class='text-green-500 font-semibold'>
                            ✔Profile Created succesfully
                            <a class='text-red-500 decoration-underline' target='_blank' href='$user[0]$user[1]$rand_id.html'>check it</a>
                            </p>";
                        }
                    }
                    ?>
                </form>

            </div>
        </div>
    </div>
</body>

</html>