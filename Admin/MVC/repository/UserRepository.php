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

    function logIn($email): array
    {
        $users = [];
        $value = $this->db
            ->setquery('select*from users where email=?')
            ->loadrow([$email]);

        $this->mapDataToModel(
            $value,
            [
                'id',
                'image',
                'status',
                'userName',
                'password',
                'name',
                'email'
            ]
        );

        $users[] = $this->userModel;
        return $users;
    }

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


    function Delete($id, $user)
    {
        return $this->db
            ->setquery('update users set status= 0 where id=? and user_name!=?')
            ->save([$id, $user]);
    }

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

    function update($id, $password, $user_name, $name, $image, $email, $gender, $phone, $status)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        return $this->db
            ->setquery('update users set user_name=?,password=?, name=?, gender=?,image=?,email=?, phone=?, status=? where id =?')
            ->save([$user_name, $hashedPassword, $name, $gender, $image, $email, $phone, $status, $id]);
    }

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

    function restore($id)
    {
        return $this->db
            ->setquery('update users set status =2 where id=?')
            ->save([$id]);
    }

    function deletePermanently($id)
    {
        return $this->db->setquery('delete from users where id =?')->save([$id]);
    }


    function add($user_name, $password, $name, $email, $phone, $image, $status, $created_at, $updated_at, $gender)
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
                              `gender`, 
                              `status`,
                              `created_at`, 
                              `updated_at`) 
                              values (?,?,?,?,?,?,?,?,?,?)')
            ->save([$user_name, $hashedPassword, $name, $phone, $email, $image, $gender, $status, $created_at, $updated_at]);
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
        if (empty($fields) || in_array('status', $fields)) {
            $this->userModel->setStatus($value->status);
        }
        if (empty($fields) || in_array('created_at', $fields)) {
            $this->userModel->setCreated_at($value->created_at);
        }
        if (empty($fields) || in_array('updated_at', $fields)) {
            $this->userModel->setUpdated_at($value->updated_at);
        }
        if (empty($fields) || in_array('address', $fields)) {
            $this->userModel->setAddress($value->address);
        }
    }
}
