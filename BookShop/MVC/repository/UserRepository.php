<?php

class userRepository extends Repository
{
    private $db = null;
    private $userModel = null;

    function __construct()
    {
        $this->db = new Repository();
        $this->userModel = new User();
    }
    // login user
    function logIn($email): array
    {
        $users = [];
        $value = $this->db
            ->setquery('select*from users where email=?')
            ->loadrow([$email]);
        //dd($value);
        $this->mapDataToModel(
            $value,
            [
                'id',
                'email',
                'image',
                'status',
                'userName',
                'password',
                'name',
                'phone',
                'gender',
                'address'
            ]
        );

        $users[] = $this->userModel;
        //  /   dd($users);

        return $users;
    }

    // update in payment
    function updateUser($id, $phone, $address)
    {
        return $this->db->setquery('UPDATE users SET phone = ?, address = ? WHERE `users`.`id` = ?;')
            ->save([$phone, $address, $id]);
    }

    // update password
    function updatePassword($id, $newPasswordHash)
    {
        return $this->db
            ->setquery('UPDATE users SET password = ? WHERE id = ?')
            ->save([$newPasswordHash, $id]);
    }

    // list user
    function list(): array
    {
        $users = [];
        $lists = $this->db->setquery('select*from users where status != 0')->loadrows();

        foreach ($lists as $value) {
            $this->mapDataToModel(
                $value,
                [
                    'id',
                    'image',
                    'userName',
                    'gender',
                    'name',
                    'phone',
                    'email',
                    'status'
                ]
            );

            $users[] = clone $this->userModel;
            $this->userModel->reset();
        }
        return $users;
    }

    // delete user
    function Delete($id, $user)
    {
        return $this->db
            ->setquery('update users set status= 0 where id=? and user_name!=?')
            ->save([$id, $user]);
    }

    // get 1 user
    function getUserById($id): array
    {
        $users = [];
        $value = $this->db
            ->setquery('select*from users where status !=0 and id =?')
            ->loadrow([$id]);

        $this->mapDataToModel(
            $value,
            [
                'id',
                'password',
                'userName',
                'name',
                'image',
                'gender',
                'phone',
                'email',
                'address',
                'status'
            ]
        );

        $users[] = $this->userModel;
        return $users;
    }

    // update user information in profile
    function update($id, $name, $image, $address, $email, $gender, $phone)
    {
        return $this->db
            ->setquery('update users set  name=?, gender=?,image=?,address=?, email=?, phone=? where id =?')
            ->save([$name, $gender, $image, $address, $email, $phone, $id]);
    }

    // check profile user
    function checkProfile($id): array
    {
        $users = [];
        $value = $this->db
            ->setquery('select*from users where status !=0 and id =?')
            ->loadrow([$id]);

        $this->mapDataToModel(
            $value,
            [
                'id',
                'password',
                'userName',
                'name',
                'image',
                'gender',
                'phone',
                'email',
                'status'
            ]
        );

        $users[] = $this->userModel;
        return $users;
    }

    // search user
    function search($user_name): array
    {
        $users = [];
        $lists = $this->db
            ->setquery('select * from users where user_name like ? and status !=0')
            ->loadrows([$user_name]);

        foreach ($lists as $value) {
            $this->mapDataToModel(
                $value,
                [
                    'id',
                    'image',
                    'userName',
                    'gender',
                    'name',
                    'phone',
                    'email',
                    'status'
                ]
            );

            $users[] = clone $this->userModel;
            $this->userModel->reset();
        }
        return $users;
    }

    // check user deleted
    function checkHistory(): array
    {
        $users = [];
        $lists = $this->db->setquery('select*from users where status = 0')->loadrows();

        foreach ($lists as $value) {
            $this->mapDataToModel(
                $value,
                [
                    'id',
                    'image',
                    'userName',
                    'gender',
                    'name',
                    'phone',
                    'email',
                    'status'
                ]
            );

            $users[] = clone $this->userModel;
            $this->userModel->reset();
        }
        return $users;
    }

    // restore user
    function restore($id)
    {
        return $this->db
            ->setquery('update users set status =2 where id=?')
            ->save([$id]);
    }

    // delete user forever
    function deletePermanently($id)
    {
        return $this->db->setquery('delete from users where id =?')->save([$id]);
    }

    // add user
    function add($user_name, $password, $name, $phone, $email, $image, $gender)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        return $this->db
            ->setquery('insert into users(
                              `user_name`,
                              `password`, 
                              `name`,
                              `phone`,
                              `email`,
                              `image`, 
                              `gender`) 
                              values (?,?,?,?,?,?,?)')
            ->save([$user_name, $hashedPassword, $name, $phone, $email, $image, $gender]);
    }
    // check email exist
    public function checkEmailExists()
    {
        $emails = $this->db
            ->setquery('SELECT email FROM users')
            ->loadrows();
            foreach ($emails as $email) {
                $this->mapDataToModel(
                    $email,
                    [
                        'email'
                    ]
                );
    
                $users[] = clone $this->userModel;
                $this->userModel->reset();
            }
            return $users;
    }
    //----------------------------------------------- SET ROLE  -----------------------------------------------------------

    function listActive(): array
    {
        $users = [];
        $lists = $this->db->setquery('select*from users where status =1')->loadrows();

        foreach ($lists as $value) {
            $this->mapDataToModel(
                $value,
                [
                    'id',
                    'image',
                    'userName',
                    'gender',
                    'name',
                    'phone',
                    'email',
                    'status'
                ]
            );

            $users[] = clone $this->userModel;
            $this->userModel->reset();
        }
        return $users;
    }

    function listFunctions($para = 0): array
    {
        $rs = $this->db
            ->setquery('select*from functions where status = 1 and parent_id = ? ')
            ->loadrows([$para]);
        return $rs;
    }

    function access($user_id, $func_id)
    {
        $rs = $this->db
            ->setquery('insert into roles(user_id, func_id) values (?,?)')
            ->save([$user_id, $func_id]);
        return $rs;
    }

    function checkRole($user_id, $func_id)
    {
        $rs = $this->db
            ->setquery('select*from roles where user_id = ? and func_id= ?')
            ->loadrow([$user_id, $func_id]);
        return $rs;
    }

    function deny($user_id)
    {
        $rs = $this->db
            ->setquery('delete from roles where user_id=?')
            ->save([$user_id]);
        return $rs;
    }

    function listMenu($user_id, $parent_id = 0)
    {
        $rs = $this->db
            ->setquery('SELECT* from functions
                            WHERE show_menu =1 and parent_id = ? 
                            and id in 
                            (SELECT func_id from roles WHERE user_id = ?
                            );')
            ->loadrows([$parent_id, $user_id]);
        return $rs;
    }

    function confirmRole($user_id, $controller, $action)
    {
        $rs = $this->db
            ->setquery('select*from roles 
        where user_id= ? and func_id = (
        SELECT id 
        from functions 
        where controller = ? and action = ? and status =1);')
            ->loadrow([$user_id, $controller, $action]);
        return $rs;
    }

    //----------------------------------------------- MAP DATA TO MODEL  -----------------------------------------------------------
    function mapDataToModel($value, $fields = [])
    {
        if (empty($fields) || in_array('id', $fields)) {
            $this->userModel->setId($value->id);
        }
        if (empty($fields) || in_array('userName', $fields)) {
            $this->userModel->setUsername($value->user_name);
        }
        if (empty($fields) || in_array('password', $fields)) {
            $this->userModel->setPassword($value->password);
        }
        if (empty($fields) || in_array('name', $fields)) {
            $this->userModel->setName($value->name);
        }
        if (empty($fields) || in_array('phone', $fields)) {
            $this->userModel->setPhone($value->phone);
        }
        if (empty($fields) || in_array('email', $fields)) {
            $this->userModel->setEmail($value->email);
        }
        if (empty($fields) || in_array('image', $fields)) {
            $this->userModel->setImage($value->image);
        }
        if (empty($fields) || in_array('gender', $fields)) {
            $this->userModel->setGender($value->gender);
        }
        if (empty($fields) || in_array('address', $fields)) {
            $this->userModel->setAddress($value->address);
        }
        if (empty($fields) || in_array('status', $fields)) {
            $this->userModel->setStatus($value->status);
        }
        if (empty($fields) || in_array('created_at', $fields)) {
            $this->userModel->setCreated_at($value->created_at);
        }
        if (empty($fields) || in_array('updated_at', $fields)) {
            $this->userModel->setUpdated_at($value->updated_at);
        }
    }
}
