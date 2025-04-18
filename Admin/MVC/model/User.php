<?php
class User
{
    private $id, $password, $userName, $gender, $name, $phone, $email, $image, $status,$address,$created_at,$updated_at;
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getUsername()
    {
        return $this->userName;
    }
    public function setUsername($userName)
    {
        $this->userName = $userName;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getGender()
    {
        return $this->gender;
    }
    public function setGender($gender)
    {
        $this->gender = $gender;
    }
    public function getphone()
    {
        return $this->phone;
    }
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }
    public function getAddress()
    {
        return $this->address;
    }
    public function setAddress($address)
    {
        $this->address = $address;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }
    public function getCreate_at()
    {
        return $this->created_at;
    }
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
    }
    public function getUpdated_at()
    {
        return $this->updated_at;
    }
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;
    }
    public function reset()
    {
        $this->id = null;
        $this->name = null;
        $this->password = null;
        $this->userName = null;
        $this->image = null;
        $this->gender = null;
        $this->phone = null;
        $this->email = null;
        $this->status = null;
        $this->created_at = null;
        $this->updated_at = null;

    }
}
