<?php

class userController extends controller
{
    public $userRepository = null;

    // khởi tạo instance
    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new userRepository();
        $this->orderRepository = new OrderRepository();
    }

    //login

    function authenticate()
    {
        // /dd($_POST);

        //    /  dd($_SESSION);
        if (isset($_COOKIE["save"]) && $_COOKIE["save"]) {
            $_SESSION["login_status"] = true;
            $_SESSION["login_id"] = $_COOKIE["id"];;
            $_SESSION["name"] = $_COOKIE["name_user"];
            $_SESSION["avata"] = $_COOKIE["avt"];
            $_SESSION["user_name"] = $_COOKIE["user_name"];
            $_SESSION['email'] = $_COOKIE["email"];
            $_SESSION['phone'] = $_COOKIE["phone"];
            $_SESSION['address'] = $_COOKIE["address"];
        }

        if (isVerified()) {
            redirect(BASE);
        }

        if (isset($_POST["email"]) && isset($_POST["pass"])) {

            $users = $this->userRepository
                ->logIn($_POST["email"]);
            //  dd( $users); 
            foreach ($users as $user) {
                if ($user->getEmail() != $_POST["email"]) {
                    $this->setError(['alert1' => messenger('Email is not exist, Try again!')]);
                    redirect(href('user', 'authenticate'));
                }
                if (!password_verify($_POST["pass"], $user->getPassword())) { // Use password_verify
                    $this->setError(['alert1' => messenger('Wrong password, Try again!')]);
                    redirect(href('user', 'authenticate'));
                }

                $_SESSION["login_status"] = true;
                $_SESSION["login_id"] = $user->getId();
                $_SESSION["name"] = $user->getName();
                $_SESSION["avata"] = $user->getImage() ? $user->getImage() : 'noimg.jpg';
                $_SESSION["user_name"] = $user->getUsername();
                $_SESSION['email'] = $user->getEmail();
                $_SESSION['phone'] = $user->getPhone();
                $_SESSION['address'] = $user->getAddress();



                if (isset($_POST["save"]) && $_POST["save"] == true) {
                    $time = time() + 84600;
                    setcookie("save", true, $time);
                    setcookie("id", $_SESSION["login_id"], $time);
                    setcookie("name_user", $_SESSION["name"], $time);
                    setcookie("avt", $_SESSION["avata"], $time);
                    setcookie("user_name", $_SESSION["user_name"], $time);
                    setcookie("email", $_SESSION["email"], $time);
                    setcookie("phone", $_SESSION["phone"], $time);
                    setcookie("address", $_SESSION["address"], $time);
                }
                redirect(BASE);


                exit;
            }
        }

        $this->show('view/user/Login', '', 'LayoutLogin');
    }


    //logout
    function logOut()
    {
        session_destroy();
        setcookie('save', false, 0);
        redirect(href('user', 'authenticate'));
    }

    // get all users
    function getAllUsers()
    {
        $list = $this->userRepository->list();
        dd($list);
        $data = ['list' => $list];
        $this->show('view/user/List', $data);
    }

    // delete user
    function delete()
    {
        if (!isset($_GET['id'])) {
            redirect(href('user', 'getAllUsers'));
        }

        $user = $this->userRepository->delete($_GET['id'], $_SESSION["user_name"]);
        $this->setError(['alert' => $user ?
            messenger('Delete Successfully', 'success') :
            messenger('Delete Failed')]);

        redirect(href('user', 'getAllUsers'));
    }

    // edit user
    function edit()
    {
        //dd($_SESSION);
        $edit = $this->userRepository->getUserById($_GET['id']);
        // dd($edit);

        $data = ['data' => $edit];
        if (!isset($_GET['id']) && !$_GET['id']) {
            redirect(BASE);
        }

        $this->show('view/user/Edit', $data);
    }

    // save user
    function save()
    {
        //    dd($_SESSION);
        $users = $this->userRepository->getUserById($_POST['id']);
        foreach ($users as $user) {

            if (!$user) {
                redirect(href('user', 'edit'));
            }

            $avt = $user->getImage();
            if (isset($_FILES['avt']['error']) && $_FILES['avt']['error'] == 0) {
                $avt = myUpload(
                    $_FILES['avt'] ?? null,
                    $imgMessenger,
                    '../../BookShop/MVC/view/JS/img'
                );
            } else {
                if (!$_POST['avt_2']) {
                    unlink($avt);
                    $avt = '';
                }
            }

            $update = $this->userRepository->update(
                trim($user->getId()),
                trim($_POST['fullName']),
                $avt,
                trim($_POST['address']),
                trim($_POST['email']),
                trim($_POST['gender']),
                trim($_POST['phone'])
            );
            $_SESSION["name"] = trim($_POST['fullName']);
            $_SESSION["avata"] = $avt ? $avt : 'noimg.jpg';
            $_SESSION['email'] =  trim($_POST['email']);
            $_SESSION['phone'] = trim($_POST['phone']);
            $_SESSION['address'] = trim($_POST['address']);
            $this->setError(['alert' => !$update ?
                messenger('Update Faild') :
                messenger('Update Successfully', 'success')]);

            redirect(href('user', 'edit', ['id' => $user->getId()]));
            $user = $this->userRepository->getUserById($user->getId());
        }
    }

    // history user
    function checkHistory()
    {
        $user = $this->userRepository->checkHistory();
        $this->show('view/user/History', ['list' => $user]);
    }

    // delete forever user
    function deletePermanently()
    {
        $user = $this->userRepository->deletePermanently($_GET['id']);
        $this->setError(['alert' => $user ?
            messenger('Delete Forever Successfully', 'success') :
            messenger('Delete Failed')]);

        redirect(href('user', 'checkHistory'));
    }

    // restore user
    function restore()
    {
        $user = $this->userRepository->restore($_GET['id']);
        $this->setError(['alert' => $user ?
            messenger('Restore Successfully', 'success') :
            messenger('Restore Failed')]);

        redirect(href('user', 'checkHistory'));
    }

    // search user
    function search()
    {
        $user = $this->userRepository->search($_POST['user_name']);
        $this->show('view/user/Search', ['list' => $user]);
    }
    // change password
    function changePassword()
    {
        $this->show('view/user/ChangePassword');
    }

    // update password 
    function updatePassword()
    {
        //dd($_POST);
        // 1. Get user ID from session
        $userId = $_SESSION['login_id'];
        // 2. Get user data from the database
        $users = $this->userRepository->getUserById($userId);
        foreach ($users as $user) {
            // 3. Verify current password
            if (!password_verify($_POST['currentPassword'], $user->getPassword())) {
                $this->setError(['alert1' => messenger('Incorrect current password.', 'danger')]);
                redirect(href('user', 'changePassword'));
                return;
            }

            // 4. Validate new password
            if ($_POST['currentPassword'] === $_POST['newPassword']) {
                $this->setError(['alert1' => messenger('Please choose new password.', 'danger')]);
                redirect(href('user', 'changePassword'));
                return;
            }

            // 5. Hash the new password
            $newPasswordHash = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);

            // 6. Update the password in the database
            $update = $this->userRepository->updatePassword($userId, $newPasswordHash);

            if ($update) {
                $this->setError(['alert1' => messenger('Password updated successfully.', 'success')]);
            } else {
                $this->setError(['alert1' => messenger('Failed to update password.', 'danger')]);
            }

            redirect(href('user', 'changePassword'));
        }
    }
    // profile user
    function checkProfile()
    {
        // dd($_SESSION);
        $this->show('view/user/Profile');
    }
    // preferences
    function preferences()
    {
        $this->show('view/user/Preferences');
    }


    // add user
    function addNewUser()
    {
        // dd($_POST);
        if (isset($_POST['name'])) {
            $avt = myUpload(
                $_FILES['avt'] ?? null,
                $imgMessenger,
                '../../BookShop/MVC/view/JS/img'
            );
            $user_name = $_POST['user_name'] ?? '';
            $password = $_POST['password'] ?? '';
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $gender = $_POST['gender'] ?? null;
            $flag = true;
            $messenger = '';
            $checkEmail = $this->userRepository->checkEmailExists();
            foreach ($checkEmail as $Cemail) {
                if ($Cemail->getEmail() == $email) {
                    $flag = false;
                    $messenger .= 'Email have already exist, please choose another email';
                }
            }

            if ($password == '') {
                $flag = false;
                $messenger .= 'password must not empty<br>';
            }


            if ($flag) {
                $create = $this->userRepository
                    ->add(
                        $user_name,
                        $password,
                        $name,
                        $phone,
                        $email,
                        $avt,
                        $gender
                    );

                if ($create) {
                    $this->setError(['alert1' =>
                    messenger('User created successfully.', 'success')]);
                } else {
                    $this->setError(['alert1' =>
                    messenger('Failed to create user.')]);

                    redirect(href('user', 'addNewUser'));
                }
            } else {
                $this->setError(['alert1' => messenger($messenger)]);
            }
        } else {
        }


        $this->show('view/user/Add', '', 'LayoutLogin');
    }
    // check email exist
    public function ajaxCheckEmail()
    {
        dd($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
            $email = $_POST['email'];
            $exists = $this->userRepository->checkEmailExists($email);

            echo json_encode(['exists' => $exists]);
        } else {
            echo json_encode(['exists' => false]);
        }
    }
}
